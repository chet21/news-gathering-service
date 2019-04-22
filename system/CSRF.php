<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.04.2019
 * Time: 22:28
 */

namespace System;


use App\Configuration\BaseConfiguration;

class CSRF extends BaseConfiguration
{
    static public function token($user_hash)
    {
        $token = sha1($user_hash.self::get('sold'));
        return $token;
    }
}