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
    private $db;
    private $bot_status;
    private $bot_list = [
            'Googlebot','YandexBot', 'SemrushBot', 'Exabot' , 'Trident',
            'YandexMetrika', 'AdsBot-Google-Mobile'
    ];

    public function __construct()
    {
        $this->location = new UserLocation();
        $this->db = new ORM('stat_request');
        $this->part = __DIR__.'/../logs/host_logs/';
        $this->bot_status = 'not_bot '.$_SERVER['HTTP_USER_AGENT'];
        $this->is_bot();
    }

    public function get_log_db($date = null)
    {
        if(!$date){
            $date = date('Y-m-d');
        }else{
            if(!preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $date)){
                throw new \Exception('DATE FORMAT FAILED, MUST BY LIKE - 1970-12-30');
            }
        }
        $this->db->select();
//        $this->db->where('time >= \''.$date.' 00:00:00\' AND time <= NOW()');
        $this->db->where('time >= \''.$date.' 00:00:00\' AND time <= \''.$date.' 23:59:59\'');

//        echo $this->db->query;
        return $this->db->run();
    }

    public function write_log_db()
    {

        $data = [
            'ip' => $this->location->ip,
            'city' => $this->location->getCity(),
            'f' => ($_SERVER['HTTP_REFERER'] !== null) ? $_SERVER['HTTP_REFERER'] : 'undefined',
            't' => $_SERVER['REQUEST_URI'],
            'bot' => $this->bot_status
        ];

        $this->db->insert($data);
        $this->db->run();
    }

    private function is_bot()
    {
        $bot_status = null;

        foreach($this->bot_list as $item){
            if(preg_match('/'.$item.'/', $_SERVER['HTTP_USER_AGENT'], $r)){
                $this->bot_status = 'is_bot '. implode(' - ', $r);
                break;
            }
        }
    }
}