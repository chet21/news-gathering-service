<?php

namespace App\Controllers;


use Lib\User\User;

class EnterController extends BaseSecureController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        echo $this->twig->render('secure/enter', []);
    }

    public function authAction()
    {
        if(!$_POST){
            Error::E404();
        }else{
            $user = new User();
        }
    }
}