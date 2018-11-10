<?php

namespace App;

use App\Router\Router;
use App\DI\Resolver;
use App\Renderer\PHPRendererInterface;

class App
{
    private $router;
    private $renderer;
    
    public function __construct()
    {
        $path_info = $_SERVER['PATH_INFO'] ?? '/';
        $request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $this->router = new Router($path_info, $request_method);
    }

    public function setRenderer(PHPRendererInterface $render)
    {
        $this->renderer = $render;
    }

    public function get(string $path, $fn)
    {
        $this->router->get($path, $fn);
    }

    public function post(string $path, $fn)
    {
        $this->router->post($path, $fn);
    }

    public function run()
    {
        $router = $this->router->run();
        $resolver = new Resolver;

        $data = $resolver->method($router['callback'], ['params' => $router['params']]);

        $this->renderer->setData($data);
        $this->renderer->run();
    }
}
