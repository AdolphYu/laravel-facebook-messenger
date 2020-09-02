<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Button;

/**
 * Class WebUrlButton
 */
class WebUrlButton extends Button
{
    public $type='web_url';
    public $url;
    public $title;
    public $webview_height_ratio;


    public function __construct($button)
    {
        if(isset($button['url'])){
            $this->url = $button['url'];
        }
        if(isset($button['title'])){
            $this->title = $button['title'];
        }

        if(isset($button['webview_height_ratio'])){
            $this->webview_height_ratio = $button['webview_height_ratio'];
        }
    }

}
