<?php

require __DIR__ . '/vendor/autoload.php';

$app = new App\App;
$app->setRenderer(new App\Renderer\PHPRenderer);

$app->get('/hello/{name}', function($params){
    //return 'Bem vindo ' . $params[1];
    return $params;
});

$app->run();
