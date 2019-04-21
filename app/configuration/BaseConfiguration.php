<?php

namespace App\Configuration;

class BaseConfiguration
{
    static private $data;

    static public function load($file)
    {
       self::$data = require $file;
    }

    static public function set($key, $val)
    {
        self::$data[$key] = $val;
    }

    static public function get($key)
    {
        foreach (self::$data as $k => $v){
            if($k == $key){
                $res = $v;
            }
        }
        return $res;
    }

}