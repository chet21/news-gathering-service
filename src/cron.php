<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../lib/parser/news/NewsParser24Ua.php';
require_once __DIR__.'/../system/DB.php';
//require_once __DIR__.'/../lib/parser/proxy/ProxyParser2.php';
//require_once __DIR__.'/../lib/parser/news/NewsParserObozrevatel.php';


$obj = new Lib\Parser\News\NewsParser24Ua(10);
$db = new \System\ORM('news');

foreach ($obj->data as $item)
{
   if($item['data']){
       $db->insert($item['data']);
       $db->run();
   }
}

$db->query = 'DELETE n1 FROM news n1, news n2 WHERE n1.id > n2.id AND n1.title_ua = n2.title_ua';
$db->run();

