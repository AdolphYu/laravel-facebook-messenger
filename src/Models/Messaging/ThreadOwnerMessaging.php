<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;
use AdolphYu\FBMessenger\Models\User\Persona;
use AdolphYu\FBMessenger\Models\User\Recipient;

class ThreadOwnerMessaging extends Model implements RequestInterface
{


    public function toArray()
    {
        return [];
    }

    public function getRoute()
    {
        return 'me/thread_owner';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_GET;
    }

}
