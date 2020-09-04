<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class IceBreakersDeleteMessaging extends MessengerProfileMessaging
{
    public $method = FBMSG::TYPE_DELETE;

    public function __construct()
    {

    }

    public function toArray()
    {
        return [
            'fields'=>[
                'ice_breakers'
            ]
        ];
    }

}
