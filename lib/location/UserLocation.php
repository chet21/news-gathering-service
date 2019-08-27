<?php

namespace Lib\Location;

use Helper\DayTranslate;

class UserLocation
{
    public $ip;
    public $response_obj;

    public function __construct()
    {
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->response_obj = $this->response_obj();

    }

    public function getCity($language = null)
    {
        $name = ($language = null || $language = 'en') ? 'name_en': 'name_ru';
        return $this->response_obj()->city->$name;
    }

    public function getTime()
    {
        $server_lap = 3;
        $zero_time_lap = time() - ($server_lap*60*60);
        $user_tipe_lap = $zero_time_lap + ($this->response_obj->country->utc*60*60);


//        return date('H:i', $user_tipe_lap);
        return $user_tipe_lap;
    }

    public function getWeather()
    {
        $html = 'http://api.openweathermap.org/data/2.5/forecast?id='.$this->getCityId().'&APPID=4d5bb68f487bfc8c5f9bdaa74738dd33';
        $res = file_get_contents($html);
        $c = round((json_decode($res)->list[0]->main->temp) - 273.15, 1);
        return $c;
    }

    private function getCityId()
    {
        $city_id = $this->response_obj();

        return $city_id->city->id;
    }

    private function response_obj()
    {
        $http = 'https://api.sypexgeo.net/tT1BT/json/'.$this->ip;
        $data = file_get_contents($http);
        $obj = json_decode($data);

        return $obj;
    }
}