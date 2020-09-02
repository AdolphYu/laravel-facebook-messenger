<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class Summary
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Summary extends Model
{
    public $subtotal;
    public $shipping_cost;
    public $total_tax;
    public $total_cost;



    public function __construct($summary)
    {
        if(isset($summary['subtotal'])){
            $this->subtotal = $summary['subtotal'];
        }
        if(isset($summary['shipping_cost'])){
            $this->shipping_cost = $summary['shipping_cost'];
        }
        if(isset($summary['total_tax'])){
            $this->total_tax = $summary['total_tax'];
        }
        if(isset($summary['total_cost'])){
            $this->total_cost = $summary['total_cost'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'subtotal'=>$this->subtotal,
            'shipping_cost'=>$this->shipping_cost,
            'total_tax'=>$this->total_tax,
            'total_cost'=>$this->total_cost,
        ]);
    }


}
