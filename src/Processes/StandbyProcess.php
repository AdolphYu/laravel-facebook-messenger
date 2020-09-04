<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\StandbyEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class StandbyProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.standby')){
            event(new StandbyEvent($data));
        }
    }
}
