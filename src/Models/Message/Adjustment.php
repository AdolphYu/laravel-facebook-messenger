<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class Adjustment
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Adjustment extends Model
{
    public $name;
    public $amount;

    public function __construct($adjustment)
    {
        if(isset($adjustment['name'])){
            $this->name = $adjustment['name'];
        }
        if(isset($adjustment['amount'])){
            $this->amount = $adjustment['amount'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'name'=>$this->name,
            'amount'=>$this->amount,
        ]);
    }


}
