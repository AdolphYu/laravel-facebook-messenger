<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class PassengerInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class PassengerInfo extends Model
{
    public $name;
    public $ticket_number;
    public $passenger_id;

    public function __construct($info)
    {
        if(isset($info['name'])){
            $this->name = $info['name'];
        }

        if(isset($info['ticket_number'])){
            $this->ticket_number = $info['ticket_number'];
        }

        if(isset($info['passenger_id'])){
            $this->passenger_id = $info['passenger_id'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'name'=>$this->name,
            'ticket_number'=>$this->ticket_number,
            'passenger_id'=>$this->passenger_id,
        ]);
    }


}
