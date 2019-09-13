<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.09.2019
 * Time: 22:27
 */

namespace System\Cache\News;


class CacheNews
{
    public $cache_parth;

    public function __construct($cat)
    {
        $this->cache_parth = __DIR__.'/../../var/cache/new/'.$cat.'_img_news.php';
    }

    public function delete_char($array, $iteration_array = [] )
    {

        foreach ($array as $k => $item){
            if(!is_array($item)){
                $res = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $item);
                $res = preg_replace('/\'/', '`', $res);
                $iteration_array[$k] = $res;
            }else{
                $this->delete_char($item, $iteration_array[$k]);
            }
        }

        return $iteration_array;
    }

    public function create($element, $time_valid)
    {
//        $element = $this->delete_char($element);
        $text = '';
        $text .= '<?php ' . PHP_EOL;
        $text .= 'return [' . PHP_EOL;
        $text .= '\'data\' => [' . PHP_EOL;

        if (count($element) > 0){
            foreach ($element as $k => $item){
                $item = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $item);
                $item = preg_replace('/\'/', '`', $item);
                $json_string = json_encode($item);
                $text .= '  \''.$k.'\' => \''.$json_string.'\','.  PHP_EOL;

            }
            $text .= '],' .  PHP_EOL;
        }

        $text .= '\'time_end\' => \''.(time() + ($time_valid * 60)).'\'';
        $text .= '];';

        try
        {
            file_put_contents($this->cache_parth, $text);
        }catch (\Exception $exception){
            $exception->getMessage();
        }
    }

    public function time_to_live()
    {
        $string = require_once $this->cache_parth;
        $time = $string['time_end'];
        $time = ($time > time()) ? true : false;

        return $time;
    }

    public function get()
    {
        $get_aaray = require_once $this->cache_parth;
        $result = [];

        foreach ($get_aaray['data'] as $item){
            $result[] = json_decode($item, true);
        }
//        $cache = json_decode($string['data'], true);

        return $result;
    }
}