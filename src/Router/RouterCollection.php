<?php

namespace App\Router;

use Illuminate\Support\Collection;

class RouterCollection 
{
    
    public function add(string $method, string $path, $callback)
    {
        if (!isset($this->collection[$method])) {

        }
    }
}
