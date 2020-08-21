<?php

namespace AdolphYu\FBMessenger\Models;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\User\Recipient;

class TextMessaging extends Messaging
{
    public function __construct(Recipient $recipient, Message $message)
    {
        $this->recipient = $recipient;
        $this->message = $message;
    }


}
