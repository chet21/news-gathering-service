<?php

namespace App\Controllers;


use Lib\Location\UserLocation;
use Lib\Packeg\BasePackeg;

use System\CSRF;
use System\TwigView;
use System\Lang;

abstract class BaseController
{
    protected $twig;
    protected $options;
    protected $lang;
    protected $connection;
    protected $user_id;
    protected $location;

    public function __construct()
    {
        $this->options = new BasePackeg();
        $this->lang = new Lang(__DIR__ . '/../../../var/lang/' .$this->options->current_lang().'.php');
        $this->location = new UserLocation();

        global $sape;
        if (!defined('_SAPE_USER')){
            define('_SAPE_USER', 'c84f95c8152f1f2d3d24c1daca62ce04');
        }
        require_once(realpath($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'));
        $o['charset'] = 'utf-8';
        $sape = new \SAPE_client($o);


        $this->twig  = new TwigView();
        $this->twig->addG('ln', $this->lang->get_list());
        $this->twig->addG('opt', $this->options->param);
        $this->twig->addG('menu', $this->options->site_top_menu('ua'));
        $this->twig->addG('url', $this->options->current_url());
        $this->twig->addG('sape_links', $sape->return_links(3));
        $this->twig->addG('sape_rtb', $sape->return_teasers_block(451087));

        if($this->user_id['user0id']){
            $this->twig->addG('user', $this->user_id);
            $this->twig->addG('csrf', CSRF::token());
        }

        if($_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
            $this->twig->addG('location', $this->location->getCity());
            $this->twig->addG('time', $this->location->getTime());
            $this->twig->addG('weather', $this->location->getWeather());
        }
    }

    private function verification()
    {
//        $data = array();

//        $data['hash'] = ($_SESSION['hash']) ?: null;
//        $data['login'] = ($_SESSION['login']) ?: null;


//        if($_SESSION['hash'] != '' && $_SESSION['login'] != ''){
//            $request = DB::connection()
//                ->query("SELECT id FROM user WHERE hash = '$hash' AND login = '$login'")
//                ->fetchAll(\PDO::FETCH_ASSOC);
//            $this->user_id = $request[0]['id'];
//        }
    }
}