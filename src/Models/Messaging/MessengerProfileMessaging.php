<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

abstract class MessengerProfileMessaging extends Messaging
{

    public function getRoute()
    {
        return 'me/messenger_profile';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_POST;
    }

}
