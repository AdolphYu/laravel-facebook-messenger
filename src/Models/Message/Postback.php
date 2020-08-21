<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

class Postback extends Model
{
    public $payload;
    public $title;


    public function __construct($quickReply)
    {
        if(isset($quickReply['payload'])){
            $this->payload = $quickReply['payload'];
        }

        if(isset($quickReply['title'])){
            $this->title = $quickReply['title'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'payload'=>$this->payload,
            'title'=>$this->title,
        ]);
    }
}
