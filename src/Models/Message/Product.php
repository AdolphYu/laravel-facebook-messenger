<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

class Product extends Model
{
    public $id;
    public $elements;

    public function __construct($product)
    {
        if(isset($product['id'])){
            $this->id = $product['id'];
        }
        $this->elements = collect();
        if(isset($product['elements'])){
            foreach ($product['elements'] as $element){
                $this->elements->push(new Element($element));
            }
        }
    }

    public function toArray()
    {
        return array_filter([
          'id'=>$this->id,
          'elements'=>$this->elements->toArray()
        ]);
    }

}
