<?php

namespace App\Router;

class Router
{
    private $collection;
    private $path;
    private $method;
    
    public function __construct(string $path, string $method)
    {
        $this->collection = new RouterCollection;
        $this->method = $method;
        $this->path = $path;
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
        $this->collection->add($method, $path, $fn);
    }

    public function run()
    {
        $data = $this->collection->filter($this->method);
        foreach ($data as $key => $value) {                   
            $result = $this->checkUrl($key, $this->path);
            $callback = $value;  

            if (!$result['result']) {
                $callback = null;
            }        

            if ($result['result']) {
                return [
                    'params' => $result['params'],
                    'callback' => $callback
                ];     
                break;           
            }              

        }
    }    

    public function checkUrl(string $toFind, $subject)
    {
     preg_match_all('/\{([^\}]*)\}/', $toFind, $variables);       

     $regex = str_replace('/', '\/', $toFind);       

     foreach ($variables[1] as $k => $variable) {
         $as = explode(':', $variable);
         $replacement = $as[1] ?? '([a-zA-Z0-9\-\_\ ]+)';
         $regex = str_replace($variables[$k], $replacement, $regex);           
     }
     $regex = preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);
     $result = preg_match('/^' . $regex . '$/', $subject, $params);

       //var_dump($variables, $regex, $params);

     return compact('result', 'params');       
 }


}
