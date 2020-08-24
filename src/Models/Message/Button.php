<?php

namespace AdolphYu\FBMessenger\Models\Message;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Button
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Button implements Arrayable
{
    public $type;
    public $url;
    public $title;
    public $payload;


    public function __construct($button)
    {
        if(isset($button['type'])){
            $this->type = $button['type'];
        }
        if(isset($button['url'])){
            $this->url = $button['url'];
        }
        if(isset($button['title'])){
            $this->title = $button['title'];
        }

        if(isset($button['payload'])){
            $this->payload = $button['payload'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'type'=>$this->type,
            'url'=>$this->url,
            'title'=>$this->title,
            'payload'=>$this->payload,
        ]);
    }


}
