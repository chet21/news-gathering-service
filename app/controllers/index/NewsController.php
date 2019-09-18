<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.11.2018
 * Time: 12:50
 */

namespace App\Controllers;


use System\Error;
use System\ORM;

class NewsController extends BaseIndexController
{
    private $news;

    public function __construct()
    {
        parent::__construct();
        $this->news = new ORM(['news', 'donor'] );

    }

    public function oneAction($id)
    {
        $this->news->query = 'UPDATE news SET views = views + 1';
        $this->news->where(['id' => $id[0]]);
        $this->news->run();

        $this->news->select(ORM::LEFT_JOIN);
        $this->news->where('news.id ='.$id[0]);
        $news = $this->news->run();

        if(!$news){
            Error::E404();
        }

        $this->news->select(ORM::LEFT_JOIN);
        $this->news->where('news.id < '.$id[0].' && news.id_category = '.$this->news->wrap_string($news[0]['news0id_category']).' && news.img != \'\'');
        $this->news->sort('desc');
        $this->news->limit(5);

        $ls_news = $this->news->run();




//        if(count($this->news->run()) === 0){
//            $this->news->select();
//            $this->news->where('id > '.($id[0]).' && id_category = '.$this->news->wrap_string($news[0]['id_category']));
//            $this->news->sort(ORM::SORT_DESC);
//            $this->news->limit(3);
//        }



//        $this->news->select();
//        $this->news->where('id = '.($id[0]-1).' || '.($id[0]+1));
//        $lr_news_mirror = $this->news->run();


        echo $this->twig->render('news/one', array(
            'news' => $news[0],
            'mirror' => $ls_news
        ));
    }
}