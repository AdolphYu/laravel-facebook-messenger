<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class GenericTemplateMessaging extends Messaging
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

    /**
     * addElement
     * @param $element
     * @return $this
     * @throws \AdolphYu\FBMessenger\Exceptions\UnknownTypeException
     */
    public function addElement($element){
        $this->message->addElement($element);
        return $this;
    }

}
