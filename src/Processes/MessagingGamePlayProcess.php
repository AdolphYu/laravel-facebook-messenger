<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingGamePlayProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.game_play')){
            event(new MessagingGamePlayEvent($data));
        }
    }
}
