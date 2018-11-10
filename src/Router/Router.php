<?php
namespace App\Router;

class Router
{
    private $collection;
    
    public function __construct()
    {
        $this->collection = new RouterCollection;
    }

    public function get($path, $fn)
    {
        $this->request('GET', $path, $fn);
    }

    public function post($path, $fn)
    {
        $this->request('POST', $path, $fn);
    }

    public function request($method, $path, $fn)
    {
        $this->collection->add($method, $path, $callback);
    }
}
