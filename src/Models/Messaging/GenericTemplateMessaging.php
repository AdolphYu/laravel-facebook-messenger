<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class GenericTemplateMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $elements)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>[
                'template_type'=>'generic',
                'elements'=>$elements
            ]
        ]]);
    }
}
