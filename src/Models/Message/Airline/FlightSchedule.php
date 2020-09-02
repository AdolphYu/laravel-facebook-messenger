<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class FlightSchedule
 * @package AdolphYu\FBMessenger\Models\Message
 */
class FlightSchedule extends Model
{
    public $departure_time;
    public $arrival_time;
    public $boarding_time;

    public function __construct($schedule)
    {
        if(isset($schedule['departure_time'])){
            $this->departure_time = $schedule['departure_time'];
        }

        if(isset($schedule['arrival_time'])){
            $this->arrival_time = $schedule['arrival_time'];
        }
        if(isset($schedule['boarding_time'])){
            $this->boarding_time = $schedule['boarding_time'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'departure_time'=>$this->departure_time,
            'arrival_time'=>$this->arrival_time,
            'boarding_time'=>$this->boarding_time,
        ]);
    }


}
