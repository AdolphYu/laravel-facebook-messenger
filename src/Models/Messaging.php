<?php

namespace AdolphYu\FBMessenger\Models;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\User\Recipient;
use AdolphYu\FBMessenger\Models\User\Sender;

class Messaging extends Model implements RequestInterface
{
    public $sender;
    public $recipient;
    public $timestamp;
    public $message;

    public function __construct($messaging)
    {
        if(isset($messaging['sender'])){
            $this->sender = new Sender($messaging['sender']);
        }

        if(isset($messaging['recipient'])) {
            $this->recipient = new Recipient($messaging['recipient']);
        }

        if(isset($messaging['timestamp'])) {
            $this->timestamp = $messaging['timestamp'];
        }

        if(isset($messaging['message'])) {
            $this->message = new Message($messaging['message']);
        }
    }

    public function toArray()
    {
        return array_filter([
            'sender'=>$this->sender?$this->sender->toArray():null,
            'recipient'=>$this->recipient?$this->recipient->toArray():null,
            'timestamp'=>$this->timestamp,
            'message'=>$this->message?$this->message->toArray():null,
        ]);
    }

    public function getRoute()
    {
        return 'me/messages';

    }

    public function getMethod()
    {
        return FBMSG::TYPE_POST;
    }

}
