<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Button;

/**
 * Class PhoneNumberButton
 */
class PhoneNumberButton extends Button
{
    public $type='phone_number';
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
