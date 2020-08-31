<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class GetStartMessaging extends MessengerProfileMessaging
{
    public $payload;

    /**
     * GetStartMessaging constructor.
     * @param $payload
     */
    public function __construct($payload)
    {

        $this->payload = $payload;
    }

    public function toArray()
    {
        return [
            'get_started'=>[
                'payload'=>$this->payload
            ]
        ];
    }
}
