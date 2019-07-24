<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06.01.2019
 * Time: 7:45
 */

namespace App\Controllers;

use \System\CSRF;

abstract class BaseAdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if($this->user_id['user0role'] !== 'admin'){
            header('Location: /');
        }
        if(!empty($_POST)){
            if($_POST['csrf'] !== CSRF::token($this->user_id['verification0hash'])){
                throw new \Exception('You are Bad Boy.');
            }
        }
    }
}