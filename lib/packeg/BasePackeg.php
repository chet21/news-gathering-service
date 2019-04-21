<?php

namespace Lib\Packeg;


use Helper\DayTranslate;
use Helper\TranslateDay;
use Helper\TranslateMonth;
use Lib\Location\UserLocation;
use Lib\Location\UserWeather;
use System\ORM;

class BasePackeg
{
    public function __construct()
    {
        $this->PackageOptions();
    }

    private function PackageOptions()
    {

        return $this->param = array(
            'city' => 'Khmel',
            'calendar' => [
                'day_w' => 'Monday',
                'day' => '12'
            ],
            'time' => date('H:i'),
            'temperature' => 12,
//            'menu' => $this->site_top_menu(),
            'url' => $this->current_url()
        );
    }

    public function current_url()
    {
        $url = $_SERVER['REQUEST_URI'];
        if(!$url === '/'){
            $url = explode('/', $url);
            return $url[0];
        }
        return $url;
    }

    public static function current_lang()
    {
//       echo $lang = ($_COOKIE['lang'] == 'ua') ?: 'ru';
//        echo $_COOKIE['lang'];
        return 'ua';
    }

    public function site_top_menu($fl = null)
    {
        $menu = new ORM('category');
        $menu->select();
        $menu->order_by('position');
        $menu = $menu->run();

        if($fl !== true){
            foreach ($menu as $k => $item){
                $menu[$k] = ['category' => $item['category0category'], 'id' => '/category/'.$item['category0id']];
            }
            array_unshift($menu, ['category' => 'Головна', 'id' => '/']);
        }

        return $menu;
    }
}
