<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingReferralEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingReferralProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.referral')){
            event(new MessagingReferralEvent($data));
        }
    }
}
