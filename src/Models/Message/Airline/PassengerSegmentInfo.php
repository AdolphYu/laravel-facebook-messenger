<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class PassengerSegmentInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class PassengerSegmentInfo extends Model
{
    public $segment_id;
    public $passenger_id;
    public $seat;
    public $seat_type;
    public $product_info;

    public function __construct($info)
    {
        if(isset($info['segment_id'])){
            $this->segment_id = $info['segment_id'];
        }

        if(isset($info['passenger_id'])){
            $this->passenger_id = $info['passenger_id'];
        }

        if(isset($info['seat'])){
            $this->seat = $info['seat'];
        }

        if(isset($info['seat_type'])){
            $this->seat_type = $info['seat_type'];
        }

        $this->product_info = collect();
        if(isset($info['product_info'])){
            foreach ($info['product_info'] as $product_info){
                $this->product_info->push(new ProductInfo($product_info));
            }
        }


    }

    public function toArray()
    {
        return array_filter([
            'segment_id'=>$this->segment_id,
            'passenger_id'=>$this->passenger_id,
            'seat'=>$this->seat,
            'seat_type'=>$this->seat_type,
            'product_info'=>$this->product_info->toArray(),
        ]);
    }


}
