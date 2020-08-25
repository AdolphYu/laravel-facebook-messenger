<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Button;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class AccountLinkButton
 */
class AccountLinkButton extends Button
{
    public $type='account_link';
    public $url;

    public function __construct($button)
    {
        if(isset($button['url'])){
            $this->url = $button['url'];
        }
    }

}
