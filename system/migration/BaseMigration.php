<?php


abstract class BaseMigration
{
    public $connected;

    public function __construct()
    {
        $this->connected = \System\DB::connection();
    }

}