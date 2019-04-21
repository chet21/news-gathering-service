<?php

namespace System;

use App\Configuration\BaseConfiguration;
use App\Configuration\Init;
use Lib\Packeg\BasePackeg;

class DB extends BaseConfiguration
{
    private static $connection;

    private function __construct()
    {
    }

    static function connection()
    {
        if (self::$connection == null) {
            try
            {
//                self::$connection = new \PDO('mysql:host=localhost;dbname='.self::get('db_name'), self::get('user'), self::get('password'), array(
                self::$connection = new \PDO('mysql:host=localhost;dbname=livenews', 'chet21', 'greg21', array(
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ));
            }
            catch(\PDOException $e)
            {
                echo "Ошибка: ".$e->getMessage()."<br>";
                echo "Место ошибки: ".$e->getLine();
            }
        }
        return self::$connection;
    }

    static function get_alias($table)
    {
        $sql = 'select COLUMN_NAME as col from information_schema.columns where table_schema = \''.self::get('db_name').'\' and table_name = \''.$table.'\'';
        $res = self::connection()->query($sql);
        $x = $res->fetchAll(\PDO::FETCH_ASSOC);

        $st = '';
        $pattern = '/_'.BasePackeg::current_lang().'/';

        foreach ($x as $item){
            if(preg_match($pattern, $item['col'])){
                $x = explode('_', $item['col']);
                $st .= $table.'.'.$item['col'].' as '.$table.'0'.$x[0].', ';
            }else{
                $st .= $table.'.'.$item['col'].' as '.$table.'0'.$item['col'].', ';
            }
        }

        $st = trim($st, ', ');

        return $st;
    }
}
