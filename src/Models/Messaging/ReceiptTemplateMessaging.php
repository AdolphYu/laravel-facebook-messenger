<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class ReceiptTemplateMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $payload)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>array_merge($payload,['template_type'=>'receipt'])
        ]]);
    }

}
