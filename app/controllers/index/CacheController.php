<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.09.2019
 * Time: 13:07
 */

namespace App\Controllers;


use System\Cache\News\CacheNews;
use System\ORM;

class CacheController extends BaseController
{
    public function newsAction()
    {
        $big_news = new CacheNews('big');
        $small_news = new CacheNews('small');
        $not_news = new CacheNews('no');


        $news = new ORM(['news', 'category', 'donor']);
        $news->select(ORM::LEFT_JOIN);
        $news->where('news.img != \'\'');
        $news->sort('desc');
        $news->limit(6);
        $res = $news->run();

        $big_news->create($res, 10);

        $poligon = [];

        $lock_id = '';

        for ($i = 0; $i <= count($res)-1; $i++){
            if($i <= count($res)-2){
                $lock_id .= 'news.id != '.$res[$i]['news0id'].' && ';
            }else{
                $lock_id .= 'news.id !='.$res[$i]['news0id'];
            }
        }


        $nn = new ORM(['news', 'category', 'donor']);

        foreach ($this->options->site_top_menu(true) as $v){
            $nn->select(ORM::LEFT_JOIN);
            $nn->where('news.id_category = '.$nn->wrap_string($v['category0id']).' && '.$lock_id.' && news.img != \'\'');
            $nn->sort('desc');
            $nn->limit(5);

            $poligon[$v['category0category']] = $nn->run();
        }

        $small_news->create($poligon, 10);

        $not_photo_news = new ORM('news');
        $not_photo_news->select();
        $not_photo_news->where('img = \'\'');
        $not_photo_news->sort('desc');
        $not_photo_news->limit(30);
        $not_photo_news = $not_photo_news->run();


        $sort = [];
        foreach ($not_photo_news as $item){
            $date = date('d', strtotime($item['news0time']));
            $sort[$date][] =  $item;
        }

        $not_news->create($sort, 10);

    }
}