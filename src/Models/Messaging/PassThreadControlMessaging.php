<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;
use AdolphYu\FBMessenger\Models\User\Persona;
use AdolphYu\FBMessenger\Models\User\Recipient;

class PassThreadControlMessaging extends MessageMessaging
{
    public $route = 'me/pass_thread_control';
    public $method = FBMSG::TYPE_POST;
    public $target_app_id;
    public $metadata;
    public function __construct($recipient_id, $target_app_id,$metadata='')
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->target_app_id =$target_app_id;
        $this->metadata =$metadata;

    }

    public function toArray()
    {
        return array_filter([
            'recipient'=>$this->recipient?$this->recipient->toArray():null,
            'target_app_id'=>$this->target_app_id,
            'metadata'=>$this->metadata,
        ]);
    }



}
