<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class MessageAttachmentsMessaging extends MessageMessaging
{
    public $method = FBMSG::TYPE_POST;
    public $route = 'me/message_attachments';

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
}
