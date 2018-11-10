<?php

$router->get('/hello/{id}', function($params, User $model){
    return 'Bem vindo ' . $params[1];
});