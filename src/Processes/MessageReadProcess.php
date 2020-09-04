<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessageReadEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessageReadProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.read')){
            event(new MessageReadEvent($data));
        }
    }
}
