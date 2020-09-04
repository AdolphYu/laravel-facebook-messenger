<?php

namespace AdolphYu\FBMessenger\Processes;

interface ProcessInterface
{
    public function handle($data);
}
