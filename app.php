<?php

require __DIR__ . '/vendor/autoload.php';

use App\Router\Router;
use App\DI\Resolver;

$path_info = $_SERVER['PATH_INFO'] ?? '/';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$router = new Router($path_info, $request_method);

class User
{
    public function __construct($name = 'User class')
    {
        echo $name;
    }
}

require __DIR__ . '/router.php';

$result = $router->run();

$data = (new Resolver)->method($result['callback'], [
    'params' => $result['params']
]);

var_dump($data);

