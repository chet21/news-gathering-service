<?php

namespace App\Controllers;

use System\Error;
use Lib\User\User;

class BaseSecureController
{
    protected $user;

    public function __construct()
    {
        if(!$_POST){
            Error::E404();
        }
        $this->user = new User();
    }
}