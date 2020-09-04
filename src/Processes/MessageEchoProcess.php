<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessageEchoProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data,'entry.*.messaging.*.message.is_echo')){
            event(new MessageEchoEvent($data));
        }
    }
}
