<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\User\Recipient;

class MediaTemplateMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $elements)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>[
                'template_type'=>'media',
                'elements'=>$elements
            ]
        ]]);
    }

}
