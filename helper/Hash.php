<?php

namespace Helper;

class Hash
{
    public static function get()
    {
        $x = rand();
        return md5($x);
    }
}