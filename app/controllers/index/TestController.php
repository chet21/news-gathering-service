<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.12.2018
 * Time: 22:44
 */

namespace App\Controllers;


use Lib\Location\UserLocation;
use Lib\Packeg\BasePackeg;
use Lib\Parser\News\NewsParser24Ua;
use Lib\User\User;
use System\DB;
use System\ORM;
use System\Statistics;

class TestController extends BaseIndexController
{

    public function indexAction($data)    // type: 01-01-19
    {
        $x = new Statistics();
        
        if(!empty($data[0])){
            
            echo '<pre>';
            var_dump($x->get_log_by_data($data[0]));
            echo '</pre>';

//            $file = file(__DIR__.'/../../../logs/host_logs/'.$data[0].'/log.txt');

//            echo '<table>';
//
//            foreach ($file as $item){
//                echo '<tr>';
//                echo '<td>'.$item[].'</td>';
//                echo '</tr>';
//            }
            
        }else{
            $x->get_log_all();
        }
    }

    public function xAction()
    {
        $x = new UserLocation();
        var_dump($x->response_obj());
    }
}