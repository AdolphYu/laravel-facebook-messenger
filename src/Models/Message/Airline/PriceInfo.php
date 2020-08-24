<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class PriceInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class PriceInfo implements Arrayable
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
