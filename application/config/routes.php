<?php

return [

    'blog/account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'blog/news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ],

    '/blog' => [
        'controller' => 'main',
        'action' => 'index',
    ],
];

?>