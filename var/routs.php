<?php

return array(
    // авторизація реєстрація вихід controller
    'enter' => 'enter/pages',
    'reg' => 'registration/pages',
    'out', 'pages/out',

    // перегляд новин
    'news/([0-9]+)' => 'news/one/$1',
    'category/([a-z]+)' => 'category/category/$1',

    // default
    '' => 'pages/pages',
    '/' => 'pages/pages',

    // admin
    'admin' => 'AdminPage/pages',
//    'admin/dashboard' => 'adminpage/dashboard',

    //test
    'test' => 'test/pages',
    'test/(\d{2}-\d{2}-\d{2})' => 'test/pages/$1',

    // Search

    'search' => 'search/pages'

);