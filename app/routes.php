<?php

$routes = [
    'home' => [
        'path' => '/',
        'controller' => 'HomeController',
        'method' => 'index'
    ],
    'article' => [
        'path' => '/article',
        'controller' => 'ArticleController',
        'method' => 'index'
    ],
    'contact' => [
        'path' => '/contact',
        'controller' => 'ContactController',
        'method' => 'showForm'
    ],
    'ajax-send-contact-form' => [
        'path' => '/ajax-contact',
        'controller' => 'ContactController',
        'method' => 'sendForm'
    ],
    'signup' => [
        'path' => '/signup',
        'controller' => 'UserController',
        'method' => 'signup'
    ],
    'login' => [
        'path' => '/login',
        'controller' => 'AuthController',
        'method' => 'login'
    ],
    'logout' => [
        'path' => '/logout',
        'controller' => 'AuthController',
        'method' => 'logout'
    ]

];

return $routes;
