<?php

namespace AdolphYu\FBMessenger\Models;

interface RequestInterface
{
    public function getRoute();
    public function getMethod();
}
