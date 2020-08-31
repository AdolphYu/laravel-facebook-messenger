<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class GreetingMessaging extends MessengerProfileMessaging
{
    public $greeting;

    /**
     * GreetingMessaging constructor.
     * @param $greeting
     */
    public function __construct($greeting)
    {

        $this->greeting = $greeting;
    }

    public function toArray()
    {
        return [
            'greeting'=>$this->greeting
        ];
    }
}
