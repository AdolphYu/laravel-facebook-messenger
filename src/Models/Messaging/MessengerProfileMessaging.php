<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;

abstract class MessengerProfileMessaging extends Messaging
{
    public $route = 'me/messenger_profile';
    public $method = FBMSG::TYPE_POST;


}
