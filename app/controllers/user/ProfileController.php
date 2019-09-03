<?php


namespace App\Controllers;

class ProfileController extends BaseUserController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dashboardAction()
    {
//        echo 'Profile Controller';
        echo $this->twig->render('user/dashboard', []);
    }
}