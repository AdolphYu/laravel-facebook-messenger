<?php

namespace AdolphYu\FBMessenger\Processes;



use AdolphYu\FBMessenger\Events\Message\MessageEvent;
use AdolphYu\FBMessenger\Utils\Arr;


class MessageProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data,'entry.*.messaging.*.message')){
            event(new MessageEvent($data));
        }
    }
}
