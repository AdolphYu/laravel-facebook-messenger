<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class FlightInfo
 * @package AdolphYu\FBMessenger\Models\Message
 */
class FlightInfo extends Model
{
    public $flight_number;
    public $departure_airport;
    public $arrival_airport;
    public $flight_schedule;
    public $connection_id;
    public $segment_id;
    public $aircraft_type;
    public $travel_class;



    public function __construct($info)
    {
        if(isset($info['flight_number'])){
            $this->flight_number = $info['flight_number'];
        }
        if(isset($info['departure_airport'])){
            $this->departure_airport = new Airport($info['departure_airport']);
        }
        if(isset($info['arrival_airport'])){
            $this->arrival_airport = new Airport($info['arrival_airport']);
        }
        if(isset($info['flight_schedule'])){
            $this->flight_schedule = new FlightSchedule($info['flight_schedule']);
        }

        if(isset($info['connection_id'])){
            $this->connection_id = $info['connection_id'];
        }

        if(isset($info['segment_id'])){
            $this->segment_id = $info['segment_id'];
        }

        if(isset($info['aircraft_type'])){
            $this->aircraft_type = $info['aircraft_type'];
        }
        if(isset($info['travel_class'])){
            $this->travel_class = $info['travel_class'];
        }


    }

    public function toArray()
    {
        return array_filter([
            'flight_number'=>$this->flight_number,
            'departure_airport'=>$this->departure_airport?$this->departure_airport->toArray():null,
            'arrival_airport'=>$this->arrival_airport?$this->arrival_airport->toArray():null,
            'flight_schedule'=>$this->flight_schedule?$this->flight_schedule->toArray():null,
            'connection_id'=>$this->connection_id,
            'segment_id'=>$this->segment_id,
            'aircraft_type'=>$this->aircraft_type,
            'travel_class'=>$this->travel_class,

        ]);
    }


}
