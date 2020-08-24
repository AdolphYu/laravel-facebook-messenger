<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class ProductInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class ProductInfo implements Arrayable
{
    public $title;
    public $value;


    public function __construct($info)
    {
        if(isset($info['title'])){
            $this->title = $info['title'];
        }

        if(isset($info['value'])){
            $this->value = $info['value'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'title'=>$this->title,
            'value'=>$this->value,
        ]);
    }


}
