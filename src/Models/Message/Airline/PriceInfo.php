<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class PriceInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class PriceInfo extends Model
{
    public $title;
    public $amount;
    public $currency;

    public function __construct($info)
    {
        if(isset($info['title'])){
            $this->title = $info['title'];
        }

        if(isset($info['amount'])){
            $this->amount = $info['amount'];
        }

        if(isset($info['currency'])){
            $this->currency = $info['currency'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'title'=>$this->title,
            'amount'=>$this->amount,
            'currency'=>$this->currency,
        ]);
    }


}
