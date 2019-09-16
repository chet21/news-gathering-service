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

    private function delete_char($array)
    {
        $result = [];
        foreach ($array as $k => $v){
            if(!is_array($v)){
                $value = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $v);
                $value = preg_replace('/\'/', '`', $value);
                $result[$k] = $value;
            }else{
                $result[$k] = $this->delete_char($v);
            }
        }
        return $result;
    }

    public function create($element, $time_valid)
    {
        $element = $this->delete_char($element);

        $text = '';
        $text .= '<?php ' . PHP_EOL;
        $text .= 'return [' . PHP_EOL;
        $text .= '\'data\' => \''.json_encode($element) .'\','. PHP_EOL;
        $text .= '\'time_end\' => \''.(time() + ($time_valid * 60)).'\'';
        $text .= '];';

        try
        {
            file_put_contents($this->cache_parth, $text);
        }catch (\Exception $exception){
            $exception->getMessage();
        }
    }

    public function get_time_live()
    {
        $string = require_once $this->cache_parth;
        $time = $string['time_end'];
        $time = ($time > time()) ? true : false;

        return $time;
    }

    public function get_data()
    {
        $get_array = require $this->cache_parth;

        $result = json_decode($get_array['data'], true);

        return $result;
    }
}