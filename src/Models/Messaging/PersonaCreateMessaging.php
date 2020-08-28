<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Model;
use AdolphYu\FBMessenger\Models\RequestInterface;
use AdolphYu\FBMessenger\Models\User\Persona;
use AdolphYu\FBMessenger\Models\User\Recipient;

class PersonaCreateMessaging extends Model implements RequestInterface
{
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

    public function getRoute()
    {
        return 'me/personas';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_POST;
    }

}
