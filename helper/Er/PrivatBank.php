<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.12.2018
 * Time: 22:17
 */

namespace Helper;


class PrivatBank
{
    public static function er()
    {
        $json = file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');

        return json_decode($json, true);
    }
}