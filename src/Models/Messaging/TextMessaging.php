<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class TextMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $text)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['text'=>$text]);
    }

    /**
     * addQuickReply
     * @param $quickReply
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addQuickReply($quickReply){
        $this->message->addQuickReply($quickReply);
        return $this;
    }

}
