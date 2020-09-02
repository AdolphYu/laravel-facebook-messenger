<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Models\Model;

/**
 * Class Address
 * @package AdolphYu\FBMessenger\Models\Message
 */
class Address extends Model
{
    public $street_1;
    public $street_2;
    public $city;
    public $postal_code;
    public $state;
    public $country;


    public function __construct($address)
    {
        if(isset($address['street_1'])){
            $this->street_1 = $address['street_1'];
        }
        if(isset($address['street_2'])){
            $this->street_2 = $address['street_2'];
        }
        if(isset($address['city'])){
            $this->city = $address['city'];
        }
        if(isset($address['postal_code'])){
            $this->postal_code = $address['postal_code'];
        }
        if(isset($address['state'])){
            $this->state = $address['state'];
        }
        if(isset($address['country'])){
            $this->country = $address['country'];
        }
    }

    public function toArray()
    {
        return array_filter([
            'street_1'=>$this->street_1,
            'street_2'=>$this->street_2,
            'city'=>$this->city,
            'postal_code'=>$this->postal_code,
            'state'=>$this->state,
            'country'=>$this->country,
        ]);
    }


}
