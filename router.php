<?php

$router->get('/hello/{id}', function($params){
    //return 'Bem vindo ' . $params[1];
    return $params;
});