<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\User\Recipient;

class ProductTemplateMessaging extends MessageMessaging
{
    public function __construct($recipient_id, $products)
    {
        $this->recipient = new Recipient(['id'=>$recipient_id]);
        $this->message = new Message(['attachment'=>[
            'type'=>'template',
            'payload'=>[
                'template_type'=>'product',
                'elements'=>$products
            ]
        ]]);
    }

}
