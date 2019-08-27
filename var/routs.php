<?php

return array(
    // авторизація реєстрація вихід controller
    'enter' => 'enter/index',
    'reg' => 'registration/index',
    'out', 'index/out',

    // перегляд новин
    'news/([0-9]+)' => 'news/one/$1',
    'category/([a-z]+)' => 'category/category/$1',
    'category/([a-z]+)/([0-9]+)' => 'category/category/$1/$2',

    // default
    '' => 'index/index',
    '/' => 'index/index',

    // admin
    'admin/' => '',

    //test
    'test' => 'test/index',
    'test/(\d{2}-\d{2}-\d{2})' => 'test/index/$1',
    'x' => 'test/x',
    'x/(\d{4}-\d{2}-\d{2})' => 'test/x/$1',

    // Search

    'search' => 'search/index'

);