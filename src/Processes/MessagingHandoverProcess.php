<?php

namespace AdolphYu\FBMessenger\Processes;


use AdolphYu\FBMessenger\Events\Message\MessagingEvent;
use AdolphYu\FBMessenger\Events\MessagingAppRoleEvent;
use AdolphYu\FBMessenger\Events\MessagingPassThreadControlEvent;
use AdolphYu\FBMessenger\Events\MessagingRequestThreadControlEvent;
use AdolphYu\FBMessenger\Events\MessagingTakeThreadControlEvent;
use AdolphYu\FBMessenger\Utils\Arr;

class MessagingHandoverProcess extends Process
{

    public function handle($data)
    {
        if(Arr::has($data, 'entry.*.messaging.*.pass_thread_control')){
            event(new MessagingPassThreadControlEvent($data));
        }

        if(Arr::has($data, 'entry.*.messaging.*.take_thread_control')){
            event(new MessagingTakeThreadControlEvent($data));
        }

        if(Arr::has($data, 'entry.*.messaging.*.request_thread_control')){
            event(new MessagingRequestThreadControlEvent($data));
        }

        if(Arr::has($data, 'entry.*.messaging.*.app_roles')){
            event(new MessagingAppRoleEvent($data));
        }
    }
}
