<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingPostbackEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingPostbackProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.postback')){
            event(new MessagingPostbackEvent($data));
        }
    }
}
