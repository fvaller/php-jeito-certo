<?php

require __DIR__ . '/vendor/autoload.php';

$router = new App\Router\Router;

$router->get('/hello', function(){
    return 'ola mundo!';
});

