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
    }

    public function toArray()
    {
        return array_filter([
            'id'=>$this->id,
            'retailer_id'=>$this->retailer_id,
            'image_url'=>$this->image_url,
            'title'=>$this->title,
            'subtitle'=>$this->subtitle
        ]);
    }

}
