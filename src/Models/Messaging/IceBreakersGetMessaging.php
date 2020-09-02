<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class IceBreakersGetMessaging extends MessengerProfileMessaging
{
    public $method = FBMSG::TYPE_GET;

    public function toArray()
    {
        return [];
    }

}
