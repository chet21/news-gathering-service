<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.02.2018
 * Time: 15:53
 */

namespace App\Controllers;

class BaseUserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->user_id){
            header('location: /');
        }
        $this->login = $_SESSION['login'];
        $this->hash = $_SESSION['hash'];
        $this->role = $_SESSION['role'];
    }
}