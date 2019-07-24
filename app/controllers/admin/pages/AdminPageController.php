<?php

namespace App\Controllers;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.01.2019
 * Time: 7:45
 */

class AdminPageController extends BaseAdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        echo 'pages Admin';
    }

    public function dashboardAction()
    {
        echo 'it`s admin dashboard';
    }

}