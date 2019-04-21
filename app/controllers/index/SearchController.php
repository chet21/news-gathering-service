<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 05.03.2019
 * Time: 15:43
 */

namespace App\Controllers;


class SearchController extends BaseIndexController
{
    public function indexAction()
    {

        var_dump($_GET['q']);

        echo $this->twig->render('news/search', []);
    }
}