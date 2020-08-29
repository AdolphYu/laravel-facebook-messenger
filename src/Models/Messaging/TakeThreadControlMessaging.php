<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;
use AdolphYu\FBMessenger\Models\User\Persona;
use AdolphYu\FBMessenger\Models\User\Recipient;

class TakeThreadControlMessaging extends Messaging
{

    public $metadata;
    public function __construct($recipient_id,$metadata='')
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->metadata =$metadata;

    }

    public function toArray()
    {
        return array_filter([
            'recipient'=>$this->recipient?$this->recipient->toArray():null,
            'metadata'=>$this->metadata,
        ]);
    }

    public function getRoute()
    {
        return 'me/pass_thread_control';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_POST;
    }

}
