<?php

require __DIR__.'/../vendor/autoload.php';
//require __DIR__.'/../system/DB.php';
require __DIR__.'/../system/ORM.php';
//require __DIR__.'/../lib/packeg/BasePackeg.php';

use System\ORM;

//$big_news_cache = new \System\Cache\News\CacheNews('big');
//$poligon_news_cache = new \System\Cache\News\CacheNews('small');
//$cache_not_photo_news = new \System\Cache\News\CacheNews('no');
//
//
//$query_elements = 'category.id as category0id, category.position as category0position, category.category_ as category0category';
//$query_elements = preg_replace('/_/', '_'.\Lib\Packeg\BasePackeg::current_lang(), $query_elements);
//
//
//$menu = \System\DB::connection();
//$menu_ob = $menu->query('SELECT '.$query_elements.' FROM category ORDER BY position');
//$menu_ar = $menu_ob->fetchAll(\PDO::FETCH_ASSOC);


$x = new ORM('user');
$x->select();
echo $x->query;