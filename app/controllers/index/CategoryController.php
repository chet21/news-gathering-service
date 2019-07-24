<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.12.2018
 * Time: 14:01
 */

namespace App\Controllers;


use System\ORM;

class CategoryController extends BaseIndexController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categoryAction(array $id)
    {
        $category = $id[0];
        $position = $id[1];
        $posts_on_page = 40;
        $offset = 0;
        if($position){
            $offset = $posts_on_page*($position-1);
        }

        $count = new ORM('news');
        $count->getCount();
        $count_news = $count->run();

        $pagination_count = round($count_news[0]['count'] / $posts_on_page);

//        var_dump($count_news);
//        var_dump($pagination_count);



        $news = new ORM(['news', 'category']);
        $news->select(ORM::LEFT_JOIN);
        $news->where('id_category = '.$news->wrap_string($category).' && img != \'\'');
        $news->sort('desc');
        $news->limit($posts_on_page, $offset);
        $news = $news->run();

//        echo $news->query;


        echo $this->twig->render('news/category',
            [
             'news' => $news,
             'pagination' => [
                 'position' => ($position) ?: 1,
                 'pagination_count' => $pagination_count
             ]
            ]);
    }
}