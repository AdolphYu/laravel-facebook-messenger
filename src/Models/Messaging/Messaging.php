<?php

namespace AdolphYu\FBMessenger\Models\Messaging;


use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;

abstract class Messaging extends Model implements RequestInterface
{
    public $route;
    public $method;

    public function getRoute()
    {
        return $this->route;

    }

    public function getMethod()
    {
        return $this->method;
    }


}
