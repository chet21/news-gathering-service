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
//        foreach (self::$data as $k => $v){
//            if($k == $key){
//                $res = $v;
//            }
//        }
//        return $res;

//        if(!empty(self::$data[$key])){
//            $res = self::$data[$key];
//        }else{
//            throw new \Exception('This key not exist, on cofiguration file');
//        }

        $res = self::$data[$key];
        return $res;
    }

}