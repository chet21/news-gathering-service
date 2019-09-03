<?php

namespace App\Controllers;


use Lib\User\User;
use mysql_xdevapi\Exception;

class EnterController extends BaseSecureController
{
    public function __construct()
    {
        parent::__construct();
        if($_SESSION['id']){
            header('Location: /dashboard');
        }
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
            $success = $user->enterUser($_POST['login'], $_POST['password']);

            echo $success;
        }
    }
}