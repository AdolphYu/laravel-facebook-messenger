<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessageReactionEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessageReactionProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data,'entry.*.messaging.*.reaction')){
            event(new MessageReactionEvent($data));
        }
    }
}
