<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Button;

/**
 * Class PostbackButton
 */
class PostbackButton extends Button
{
    public $type='postback';
    public $title;
    public $payload;


    public function __construct($button)
    {
        if(isset($button['title'])){
            $this->title = $button['title'];
        }

        if(isset($button['payload'])){
            $this->payload = $button['payload'];
        }

    }
}
