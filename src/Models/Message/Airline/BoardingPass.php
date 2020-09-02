<?php

namespace AdolphYu\FBMessenger\Models\Message\Airline;

use AdolphYu\FBMessenger\Models\Message\Field;
use AdolphYu\FBMessenger\Models\Model;

/**
 * Class BoardingPass
 * @package AdolphYu\FBMessenger\Models\Message
 */
class BoardingPass extends Model
{
    public $passenger_name;
    public $pnr_number;
    public $seat;
    public $logo_image_url;
    public $header_image_url;
    public $qr_code;
    public $above_bar_code_image_url;
    public $auxiliary_fields;
    public $secondary_fields;
    public $flight_info;



    public function __construct($boarding_pass)
    {
        if(isset($boarding_pass['passenger_name'])){
            $this->passenger_name = $boarding_pass['passenger_name'];
        }

        if(isset($boarding_pass['pnr_number'])){
            $this->pnr_number = $boarding_pass['pnr_number'];
        }

        if(isset($boarding_pass['seat'])){
            $this->seat = $boarding_pass['seat'];
        }

        if(isset($boarding_pass['logo_image_url'])){
            $this->logo_image_url = $boarding_pass['logo_image_url'];
        }

        if(isset($boarding_pass['header_image_url'])){
            $this->header_image_url = $boarding_pass['header_image_url'];
        }

        if(isset($boarding_pass['qr_code'])){
            $this->qr_code = $boarding_pass['qr_code'];
        }

        if(isset($boarding_pass['above_bar_code_image_url'])){
            $this->above_bar_code_image_url = $boarding_pass['above_bar_code_image_url'];
        }
        $this->auxiliary_fields = collect();
        if(isset($boarding_pass['auxiliary_fields'])){
            foreach ($boarding_pass['auxiliary_fields'] as $auxiliary_field){
                $this->auxiliary_fields->push(new Field($auxiliary_field));
            }
        }


        $this->secondary_fields = collect();
        if(isset($boarding_pass['secondary_fields'])){
            foreach ($boarding_pass['secondary_fields'] as $secondary_field){
                $this->secondary_fields->push(new Field($secondary_field));
            }
        }

        if(isset($boarding_pass['flight_info'])){
            $this->flight_info = new FlightInfo($boarding_pass['flight_info']);
        }




    }

    public function toArray()
    {
        return array_filter([
            'passenger_name'=>$this->passenger_name,
            'pnr_number'=>$this->pnr_number,
            'seat'=>$this->seat,
            'logo_image_url'=>$this->logo_image_url,
            'header_image_url'=>$this->header_image_url,
            'qr_code'=>$this->qr_code,
            'above_bar_code_image_url'=>$this->above_bar_code_image_url,
            'auxiliary_fields'=>$this->auxiliary_fields->toArray(),
            'secondary_fields'=>$this->secondary_fields->toArray(),
            'flight_info'=>$this->flight_info?$this->flight_info->toArray():null,
        ]);
    }


}
