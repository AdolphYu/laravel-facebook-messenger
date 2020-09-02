<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class Airport
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Airport extends Model
{
    public $airport_code;
    public $city;
    public $terminal;
    public $gate;




    public function __construct($airport)
    {
        if(isset($airport['airport_code'])){
            $this->airport_code = $airport['airport_code'];
        }
        if(isset($airport['city'])){
            $this->city = $airport['city'];
        }
        if(isset($airport['terminal'])){
            $this->terminal = $airport['terminal'];
        }
        if(isset($airport['gate'])){
            $this->gate = $airport['gate'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'airport_code'=>$this->airport_code,
            'city'=>$this->city,
            'terminal'=>$this->terminal,
            'gate'=>$this->gate,
        ]);
    }


}
