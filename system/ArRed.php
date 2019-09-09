<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.09.2019
 * Time: 10:39
 */

namespace System;



class ArRed
{
    public $new_element;
    public $cache_parth;

    public function __construct($new_element, $cat)
    {
        $this->new_element = json_encode($new_element);
        $this->cache_parth = __DIR__.'/../var/cache/new/'.$cat.'_img_news.php';

    }


    public function create()
    {
        $res = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/', '', $this->new_element);
        $res = preg_replace('/\'/', '`', $res);
        $text = '';
        $text .= '<?php ' . PHP_EOL;
        $text .= 'return [' . PHP_EOL;
        $text .= '\'data\' => \''.$res.'\'';
        $text .= '];';

        file_put_contents($this->cache_parth, $text);

    }

    public function get()
    {
        $string = require_once $this->cache_parth;
        $cache = json_decode($string['data'], true);
        return $cache;
    }

}