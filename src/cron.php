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
