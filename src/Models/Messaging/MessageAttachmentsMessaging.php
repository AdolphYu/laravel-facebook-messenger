<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class MessageAttachmentsMessaging extends Messaging
{
    /**
     * MessageAttachmentsMessaging constructor.
     * @param $type
     * @param $url
     * @todo not support local file
     */
    public function __construct($type,$url)
    {

        $this->message = new Message(['attachment'=>[
            'type'=>$type,
            'payload'=>[
                'is_reusable'=>true,
                'url'=>$url
            ]
        ]]);
    }

    public function getRoute()
    {
        return 'me/message_attachments';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_POST;
    }

}
