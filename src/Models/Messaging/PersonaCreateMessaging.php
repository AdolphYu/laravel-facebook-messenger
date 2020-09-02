<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;
use AdolphYu\FBMessenger\Models\User\Persona;
use AdolphYu\FBMessenger\Models\User\Recipient;

class PersonaCreateMessaging extends Messaging implements RequestInterface
{
    public $method = FBMSG::TYPE_POST;
    public $route = 'me/personas';

    public $persona;

    public function __construct($name, $url)
    {
        $this->persona = new Persona([
            'name'=>$name,
            'profile_picture_url'=>$url
        ]);

    }

    public function toArray()
    {
        return $this->persona->toArray();
    }


}
