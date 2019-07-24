<?php

use App\Configuration\BaseConfiguration;
use System\Lang;
use \System\Router;
use \System\Statistics;

session_start();

//if(is_dir('/install')){
//    require_once __DIR__.'/../install/pages.php';
//}

if($_COOKIE['lang'] == null){
    setcookie('lang', 'ua', time() + 9999, '/');
}
require_once __DIR__.'/../vendor/autoload.php';

error_reporting(E_ALL);



BaseConfiguration::load(__DIR__.'/../var/config.php');


$start = new Router();
$start->Run();

$stat = new Statistics();
$stat->set_location();