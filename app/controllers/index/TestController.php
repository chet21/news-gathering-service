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
use mysql_xdevapi\Exception;
use System\ArRed;
use System\Cache\News\CacheNews;
use System\DB;
use System\ORM;
use System\Statistics;

class TestController extends BaseIndexController
{

    public function indexAction()
    {
        $lock_id = '';
////
        $x = new CacheNews('big');
////
////        if($x->time_to_live()){
            $news = new ORM(['news', 'category', 'donor']);
            $news->select(ORM::LEFT_JOIN);
            $news->where('news.img != \'\'');
            $news->sort('desc');
            $news->limit(6);
            $res = $news->run();

            for ($i = 0; $i <= count($res)-1; $i++){
                if($i <= count($res)-2){
                    $lock_id .= 'news.id != '.$res[$i]['news0id'].' && ';
                }else{
                    $lock_id .= 'news.id !='.$res[$i]['news0id'];
                }
            }
////
            $x->create($res, 10);
////        }
////
        $xx = new CacheNews('small');
////        if($xx->time_to_live()){
            $nn = new ORM(['news', 'category', 'donor']);

            $poligon = [];
            foreach ($this->options->site_top_menu(true) as $v){
                $nn->select(ORM::LEFT_JOIN);
                $nn->where('news.id_category = '.$nn->wrap_string($v['category0id']).' && '.$lock_id.' && news.img != \'\'');
                $nn->sort('desc');
                $nn->limit(3);

                $poligon[$v['category0category']] = $nn->run();
            }
//
//        echo '<pre>';
//           $xx->create($poligon, 10);
            $xx->create($poligon, 10);
//            echo '</pre>';
//        }
//
        $xxx = new CacheNews('no');
////
            $not_photo_news = new ORM('news');
            $not_photo_news->select();
            $not_photo_news->where('img = \'\'');
            $not_photo_news->sort('desc');
            $not_photo_news->limit(20);
            $not_photo_news = $not_photo_news->run();
//
        $xxx->create($not_photo_news, 10);
//            var_dump($xxx->create_data_element($not_photo_news));
////
////        }
////

//        echo $this->twig->render('index/index', array(
//            'data' => $x->get(),
//            'poligon' => $xx->get(),
////            'npn' => $xxx->get()
//        ));

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