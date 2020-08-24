<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

class Element extends Model
{
    public $id;
    public $retailer_id;
    public $image_url;
    public $title;
    public $subtitle;
    public $default_action;
    public $buttons;
    public $url;
    public $media_type;
    public $quantity;
    public $price;
    public $currency;

    public function __construct($element)
    {
        if(isset($element['id'])){
            $this->id = $element['id'];
        }
        if(isset($element['retailer_id'])){
            $this->retailer_id = $element['retailer_id'];
        }
        if(isset($element['image_url'])){
            $this->image_url = $element['image_url'];
        }
        if(isset($element['title'])){
            $this->title = $element['title'];
        }
        if(isset($element['subtitle'])){
            $this->subtitle = $element['subtitle'];
        }

        if(isset($element['default_action'])){
            $this->default_action = new Action($element['default_action']);
        }
        $this->buttons = collect();
        if(isset($element['buttons'])){
            foreach($element['buttons'] as $button){
                $this->buttons->push(new Button($button));
            }
        }

        if(isset($element['url'])){
            $this->url = $element['url'];
        }

        if(isset($element['media_type'])){
            $this->media_type = $element['media_type'];
        }

        if(isset($element['quantity'])){
            $this->quantity = $element['quantity'];
        }

        if(isset($element['price'])){
            $this->price = $element['price'];
        }

        if(isset($element['currency'])){
            $this->currency = $element['currency'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'id'=>$this->id,
            'retailer_id'=>$this->retailer_id,
            'image_url'=>$this->image_url,
            'title'=>$this->title,
            'subtitle'=>$this->subtitle,
            'default_action'=>$this->default_action?$this->default_action->toArray():null,
            'buttons'=>$this->buttons->toArray(),
            'url'=>$this->url,
            'media_type'=>$this->media_type,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'currency'=>$this->currency,
        ]);
    }

}
