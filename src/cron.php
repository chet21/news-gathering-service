<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../lib/parser/news/NewsParser24Ua.php';
require_once __DIR__.'/../system/DB.php';
require_once __DIR__.'/../system/ORM.php';
//require_once __DIR__.'/../lib/parser/proxy/ProxyParser2.php';
//require_once __DIR__.'/../lib/parser/news/NewsParserObozrevatel.php';

//
$obj = new Lib\Parser\News\NewsParser24Ua(10);
$db = new \System\ORM('news');


foreach ($obj->data as $item)
{
   if($item['data']){
       $db->insert($item['data']);
       $db->run();
   }
}

$db->query = 'DELETE `a`.* FROM `news` as `a`,
(SELECT
`b`.`title_ua`, MIN(`b`.`id`) as `mid`
FROM `news` as `b`
GROUP BY `b`.`title_ua`
ORDER BY `b`.`id` DESC
LIMIT 0, 100
) AS `c`
WHERE
`a`.`title_ua` = `c`.`title_ua`
AND `a`.`id` > `c`.`mid`';
$db->run();

$db->query = 'DELETE `a`.* FROM `news` as `a`,
(SELECT
`b`.`img`, MIN(`b`.`id`) as `mid`
FROM `news` as `b`
GROUP BY `b`.`img`
ORDER BY `b`.`id` DESC
LIMIT 0, 100
) AS `c`
WHERE
`a`.`img` = `c`.`img`
AND `a`.`id` > `c`.`mid`';
$db->run();

////////////////////////////////////////////////////////////////////////////

header('Location: /c1');

////////////////////////////////////////////////////////////////////////////

//$cache_not_photo_news = new \System\Cache\News\CacheNews('no');
//
//$not_photo_news = new \System\ORM('news');
//$not_photo_news->select();
////$not_photo_news->where('img = \'\'');
////$not_photo_news->sort('desc');
//$not_photo_news->limit(20);
//$not_photo_news = $not_photo_news->run();
//
//var_dump($not_photo_news);



//$cache_not_photo_news->create($not_photo_news, (int) 10);

///////////////////////////////////////////////////////////////////////////

//$big_news_cache = new \System\Cache\News\CacheNews('big');
//$poligon_news_cache = new \System\Cache\News\CacheNews('small');
//
//$options = new
//
//
//$lock_id = '';
//$news = new \System\ORM(['news', 'category', 'donor']);
//$news->select(\System\ORM::LEFT_JOIN);
//$news->where('news.img != \'\'');
//$news->sort('desc');
//$news->limit(6);
//$res = $news->run();
//
//for ($i = 0; $i <= count($res)-1; $i++){
//    if($i <= count($res)-2){
//        $lock_id .= 'news.id != '.$res[$i]['news0id'].' && ';
//    }else{
//        $lock_id .= 'news.id !='.$res[$i]['news0id'];
//    }
//}
//
//$big_news_cache->create($res, 10);
//
//
//$nn = new \System\ORM(['news', 'category', 'donor']);
//
//$poligon = [];
//foreach ($this->options->site_top_menu(true) as $v){
//    $nn->select(\System\ORM::LEFT_JOIN);
//    $nn->where('news.id_category = '.$nn->wrap_string($v['category0id']).' && '.$lock_id.' && news.img != \'\'');
//    $nn->sort('desc');
//    $nn->limit(5);
//
//    $poligon[$v['category0category']] = $nn->run();
//}
//
//$poligon_news_cache->create($poligon, 10);

///////////////////////////////////////////////////////////////////////////

