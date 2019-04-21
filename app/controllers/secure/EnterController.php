<?php

namespace App\Controllers;


class EnterController extends BaseSecureController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        echo $this->user->enterUser($_POST['login'], $_POST['password']);
    }
}