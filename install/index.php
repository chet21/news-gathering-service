<?php

require_once __DIR__.'/../vendor/autoload.php';

$migraton = new Migration();

if($migraton->full()){
    rmdir('/install');
}