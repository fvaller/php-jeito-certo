<?php

namespace App\Renderer;

class PHPRenderer implements PHPRendererInterface
{
    private $data;

    public function setData($data)
    {
        $this->data = $data;
    }

    public function run()
    {
        //se for string apenas imprime na tela a string
        if (is_string($this->data)){            
            header("Content-Type:text/html;charset=UTF-8");
            echo $this->data;
            exit();
        }

        //se for string apenas imprime na tela a string
        if (is_array($this->data)){
            header("Content-Type:application/json");
            echo json_encode($this->data);            
            exit();
        }

        //se for string ou array gerar o error
        throw new \Exception("Data is invalid!");        
    }
}
