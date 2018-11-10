<?php

require __DIR__ . '/vendor/autoload.php';

use App\Router\Router;
use App\DI\Resolver;
use App\Renderer\PHPRenderer;

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router = new Router($path_info, $request_method);

require __DIR__ . '/router.php';

$result = $router->run();

$data = (new Resolver)->method($result['callback'], [
    'params' => $result['params']
]);

$render = new PHPRenderer;
$render->setData($data);
$render->run();

//var_dump($data);

