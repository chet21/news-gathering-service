<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.01.2019
 * Time: 12:41
 */

namespace Helper;


class LnLocation
{
    public static function get_items()
    {
        $x = scandir(__DIR__.'/../var/lang');
        $res = [];

        foreach ($x as $item) {
            if(preg_match('/.php/', $item)){
                $p = explode('.', $item);
                $res[] = $p[0];
            }
        }
        return $res;
    }
}