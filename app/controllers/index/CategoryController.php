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

    public function categoryAction($id)
    {
        $news = new ORM('news');
        $news->select();
        $news->where('id_category = '.$news->wrap_string($id[0]));
        $news->limit(10);
        $news = $news->run(ORM::SORT_DESC);

//        var_dump($news);
//        var_dump($news->query);

        echo $this->twig->render('news/category', []);
    }
}