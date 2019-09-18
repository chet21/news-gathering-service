<?php

namespace App\Controllers;

use System\ArRed;
use System\Cache\News\CacheNews;
use System\ORM;

class IndexController extends BaseIndexController
{

    public function indexAction()
    {
//        $news = new ORM(['news', 'category', 'donor']);
//        $news->select(ORM::LEFT_JOIN);
//        $news->where('news.img != \'\'');
//        $news->sort('desc');
//        $news->limit(6);
//        $res = $news->run();
//
//        $poligon = [];
//
//        $lock_id = '';
//
//        for ($i = 0; $i <= count($res)-1; $i++){
//            if($i <= count($res)-2){
//                $lock_id .= 'news.id != '.$res[$i]['news0id'].' && ';
//            }else{
//                $lock_id .= 'news.id !='.$res[$i]['news0id'];
//            }
//        }
//
//
//        $nn = new ORM(['news', 'category', 'donor']);
//
//        foreach ($this->options->site_top_menu(true) as $v){
//            $nn->select(ORM::LEFT_JOIN);
//            $nn->where('news.id_category = '.$nn->wrap_string($v['category0id']).' && '.$lock_id.' && news.img != \'\'');
//            $nn->sort('desc');
//            $nn->limit(5);
//
//            $poligon[$v['category0category']] = $nn->run();
//        }
//
//        $not_photo_news = new ORM('news');
//        $not_photo_news->select();
//        $not_photo_news->where('img = \'\'');
//        $not_photo_news->sort('desc');
//        $not_photo_news->limit(20);
//        $not_photo_news = $not_photo_news->run();
//
//        echo $this->twig->render('index/index', array(
//            'data' => $res,
//            'poligon' => $poligon,
//            'npn' => $not_photo_news
//        ));
//
        $big_news = new CacheNews('big');
        $small_news = new CacheNews('small');
        $no_photo_news = new CacheNews('no');

        echo $this->twig->render('index/index', array(
            'data' => $big_news->get_data(),
            'poligon' => $small_news->get_data(),
            'npn' => $no_photo_news->get_data()
        ));


    }

    public function contact()
    {

    }

    public function support()
    {

    }

    public function langAction()
    {
        if(isset($_POST['lang'])){
            setcookie('lang', 'ru', time()+7777777, '/');
        }
    }
}
