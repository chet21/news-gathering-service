<?php

namespace App\Controllers;


class OutController extends BaseSecureController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        session_unset();
    }
}