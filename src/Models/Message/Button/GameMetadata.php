<?php

namespace AdolphYu\FBMessenger\Models\Message\Button;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class GameMetadata
 */
class GameMetadata extends Model
{
    public $player_id;
    public $context_id;

    public function __construct($meta_data)
    {
        if(isset($meta_data['player_id'])){
            $this->player_id = $meta_data['player_id'];
        }

        if(isset($meta_data['context_id'])){
            $this->context_id = $meta_data['context_id'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'player_id'=>$this->player_id,
            'context_id'=>$this->context_id,

        ]);
    }
}
