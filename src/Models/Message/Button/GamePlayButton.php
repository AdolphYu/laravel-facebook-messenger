<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Message\Button;

/**
 * Class GamePlayButton
 */
class GamePlayButton extends Button
{
    public $type='game_play';
    public $title;
    public $payload;
    public $game_metadata;

    public function __construct($button)
    {
        if(isset($button['title'])){
            $this->title = $button['title'];
        }

        if(isset($button['payload'])){
            $this->payload = $button['payload'];
        }

        if(isset($button['game_metadata'])){
            $this->game_metadata = new GameMetadata($button['game_metadata']);
        }

    }

}
