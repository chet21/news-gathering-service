<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.04.2019
 * Time: 17:10
 */

namespace System;


use Lib\Location\UserLocation;

class Statistics
{
    private $location;
    private $part;

    public function __construct()
    {
        $this->location = new UserLocation();
        $this->part = __DIR__.'/../logs/host_logs/';
    }

    public function set_location()
    {
        $city = $this->location->getCity('ru');
        $string = 'IP - '.$this->location->ip.' CITY - '.$city.' TIME - '.date('H:i:s').' FROM -'.$_SERVER['HTTP_REFERER'].' TO - '.$_SERVER['REQUEST_URI'];
        $this->write_log($string);

    }

    public function get_log_all($date_time = null)
    {
        $obj = scandir($this->part);
        $file_logs = '';

        foreach ($obj as $item){
            if (is_dir($this->part.$item)) {//
                if(preg_match('/^[0-9]+/', $item)){
                    echo '<a href="/test/'.$item.'">'.$item.'</a>'.PHP_EOL;
                }
            }
        }

        return $file_logs;
    }

    public function get_log_by_data($date_time)
    {
        if(!preg_match('/^\d{2}-\d{2}-\d{2}/', $date_time)){
            throw new \Exception('Not valid data');
        }
        $obj = scandir($this->part);

        if(in_array($date_time, $obj)){
            return file_get_contents($this->part.$date_time.'/log.txt');
        }else{
            throw new \Exception('Date dont find');
        }
    }

    private function write_log($data)
    {
        $folder = $this->part.date('d-m-y');
        $original_log = file_get_contents($folder.'/log.txt');
        $mod_log = $original_log.PHP_EOL.$data;

        if (is_dir($folder)){
            file_put_contents($folder.'/log.txt', $mod_log);
        }else{
            mkdir($folder);
            file_put_contents($folder.'/log.txt', $mod_log);
        }
    }
}