<?php

namespace App\Controllers;

use System\Cache\News\CacheNews;

class IndexController extends BaseIndexController
{

    ////////////////test element
//    private $big_news_cache;
//    private $poligon_news_cache;

    public function __construct()
    {
        parent::__construct();
    }

    ///////////////end test element

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
