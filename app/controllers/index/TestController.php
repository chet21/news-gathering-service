<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.12.2018
 * Time: 22:44
 */

namespace App\Controllers;


use App\Pattern\Facade\CreateBigNewsFacade;
use Lib\Location\UserLocation;
use Lib\Packeg\BasePackeg;
use Lib\Parser\News\NewsParser24Ua;
use Lib\User\User;
use mysql_xdevapi\Exception;
use System\ArRed;
use System\Cache\News\CacheNews;
use System\DB;
use System\ORM;
use System\Statistics;

class TestController extends BaseIndexController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function indexAction()
    {
        $big_news = new CacheNews('big');
        $small_news = new CacheNews('small');
        $not_img_news = new CacheNews('no');


        echo $this->twig->render('index/index', array(
            'data' => $big_news->get_data(),
            'poligon' => $small_news->get_data(),
            'npn' => $not_img_news->get_data()
        ));

    }

    public function xAction($date = null)
    {
        $x = new Statistics();
        if(!$date){
//            throw new Exception('period incorrect');
            $data = $x->get_log_db(date('Y-m-d'));
        }else{
            $data = $x->get_log_db($date[0]);
        }


        echo '<table border="1" style="font-size: 12px">';
        echo '<tr>';
        echo '<td>ip</td>';
        echo '<td>city</td>';
        echo '<td>time</td>';
        echo '<td>from</td>';
        echo '<td>to</td>';
        echo '<td>bot_status</td>';
        echo '</tr>';
        $bots_count = [];
        $referer_addr =[];
        $city =[];
        foreach ($data as $item){
//            echo '<tr>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0ip'].'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0city'].'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.date('d-m-y', $item['stat_request0time']).'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0time'].'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0f'].'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0t'].'</td>';
//            echo '<td style="padding-left: 5px; padding-right: 5px">'.$item['stat_request0bot'].'</td>';
            $bots_count[$item['stat_request0bot']] += 1;
            $referer_addr[$item['stat_request0f']] += 1;
            $city[$item['stat_request0city']] += 1;
//            echo '</tr>';
        }
        echo '<pre>';
        var_dump($bots_count);
        var_dump($referer_addr);
        var_dump($city);
        echo '</pre>';
        $content = ob_get_contents();
    }
}