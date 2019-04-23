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
        if($this->user_id['role'] !== 'client'){
            header('Location: /');
        }
    }
}