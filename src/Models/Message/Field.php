<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;


/**
 * Class Field
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Field extends Model
{
    public $label;
    public $value;

    public function __construct($field)
    {
        if(isset($field['label'])){
            $this->label = $field['label'];
        }
        if(isset($field['value'])){
            $this->value = $field['value'];
        }


    }

    public function toArray()
    {
        return array_filter([
            'label'=>$this->label,
            'value'=>$this->value,
        ]);
    }


}
