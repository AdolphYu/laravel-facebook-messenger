<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\Models\Message\Airline\BoardingPass;
use AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\User\Recipient;

class AirlineUpdateTemplateMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $payload)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>array_merge($payload,['template_type'=>'airline_update'])
        ]]);
    }
}
