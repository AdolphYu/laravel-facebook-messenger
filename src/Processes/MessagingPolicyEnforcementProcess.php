<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingPolicyEnforcementEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingPolicyEnforcementProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.policy_enforcement')){
            event(new MessagingPolicyEnforcementEvent($data));
        }
    }
}
