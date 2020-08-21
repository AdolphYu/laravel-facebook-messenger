<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

class Payload extends Model
{
    public $url;
    public $product;
    public $title;
    public $is_reusable;

    public function __construct($payload)
    {
        if(isset($payload['url'])){
            $this->url = $payload['url'];
        }

        if(isset($payload['product'])){
            $this->product = new Product($payload['product']);
        }

        if(isset($payload['title'])){
            $this->title = $payload['title'];
        }

        if(isset($payload['is_reusable'])){
            $this->is_reusable = $payload['is_reusable'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'url'=>$this->url,
            'product'=>$this->product?$this->product->toArray():null,
            'title'=>$this->title,
            'is_reusable'=>$this->is_reusable,
        ]);
    }

}
