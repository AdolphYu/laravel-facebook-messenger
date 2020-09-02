<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class OneTimeNotifReqMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $title,$payload)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>[
                'template_type'=>'one_time_notif_req',
                'title'=>$title,
                'payload'=>$payload,
            ]
        ]]);
    }
}
