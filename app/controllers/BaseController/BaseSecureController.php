<?php

namespace App\Controllers;

use System\Error;
use Lib\User\User;

class BaseSecureController extends BaseController
{
    protected $user;

    public function __construct()
    {
        parent::__construct();
        if($_SESSION['user_id']){
            header('Location: /dashboard');
        }
    }
}