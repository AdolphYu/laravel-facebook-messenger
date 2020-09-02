<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Button\GameMetadata;
use AdolphYu\FBMessenger\Models\Model;

/**
 *
 * Class Button
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Button extends Model
{
    public $type;
    public $url;
    public $title;
    public $payload;
    public $webview_height_ratio;
    public $game_metadata;
    public $content_type;
    /**
     * Father is great
     * Button constructor.
     * @param $button
     */
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

        if(isset($button['webview_height_ratio'])){
            $this->webview_height_ratio = $button['webview_height_ratio'];
        }


        if(isset($button['game_metadata'])){
            $this->game_metadata = new GameMetadata($button['game_metadata']);
        }

        if(isset($button['content_type'])){
            $this->content_type = $button['content_type'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'type'=>$this->type,
            'url'=>$this->url,
            'title'=>$this->title,
            'payload'=>$this->payload,
            'webview_height_ratio'=>$this->webview_height_ratio,
            'game_metadata'=>$this->game_metadata?$this->game_metadata->toArray():null,
            'content_type'=>$this->content_type,
        ]);
    }


}
