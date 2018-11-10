<?php

namespace App\Renderer;

interface PHPRendererInterface
{
    public function setData($data);
    public function run();
}
