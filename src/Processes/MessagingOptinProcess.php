<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingOptinEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingOptinProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.optin')){
            event(new MessagingOptinEvent($data));
        }
    }
}
