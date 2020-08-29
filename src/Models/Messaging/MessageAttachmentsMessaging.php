<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class MessageAttachmentsMessaging extends Messaging
{
    public function __construct($url)
    {
        $this->message = new Message(['attachment'=>[
            'type'=>'image',
            'payload'=>[
                'is_reusable'=>true,
                'url'=>$url
            ]
        ]]);
    }


}
