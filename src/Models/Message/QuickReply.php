<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

class QuickReply extends Model
{
    public $payload;
    public $title;
    public $content_type;
    public $image_url;

    public function __construct($quickReply)
    {
        if(isset($quickReply['payload'])){
            $this->payload = $quickReply['payload'];
        }

        if(isset($quickReply['content_type'])){
            $this->content_type = $quickReply['content_type'];
        }

        if(isset($quickReply['title'])){
            $this->title = $quickReply['title'];
        }

        if(isset($quickReply['image_url'])){
            $this->image_url = $quickReply['image_url'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'payload'=>$this->payload,
            'content_type'=>$this->content_type,
            'title'=>$this->title,
            'image_url'=>$this->image_url,
        ]);
    }
}
