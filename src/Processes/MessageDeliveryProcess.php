<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\MessageDeliveryEvent;
use AdolphYu\FBMessenger\Utils\Arr;


class MessageDeliveryProcess extends Process
{
    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.delivery')){
            event(new MessageDeliveryEvent($data));
        }
    }
}
