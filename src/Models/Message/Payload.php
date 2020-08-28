<?php

namespace AdolphYu\FBMessenger\Models\Message;

use AdolphYu\FBMessenger\Exceptions\UnknownTypeException;
use AdolphYu\FBMessenger\Models\Message\Airline\BoardingPass;
use AdolphYu\FBMessenger\Models\Message\Airline\FlightInfo;
use AdolphYu\FBMessenger\Models\Message\Airline\PassengerInfo;
use AdolphYu\FBMessenger\Models\Message\Airline\PassengerSegmentInfo;
use AdolphYu\FBMessenger\Models\Message\Airline\PriceInfo;
use AdolphYu\FBMessenger\Models\Model;

class Payload extends Model
{
    public $url;
    public $product;
    public $title;
    public $is_reusable;
    public $template_type;
    public $elements;
    public $text;
    public $buttons;
    public $recipient_name;
    public $order_number;
    public $currency;
    public $payment_method;
    public $order_url;
    public $timestamp;
    public $address;
    public $summary;
    public $adjustments;
    public $intro_message;
    public $locale;
    public $boarding_pass;
    public $pnr_number;
    public $checkin_url;
    public $flight_info;
    public $passenger_info;
    public $passenger_segment_info;
    public $price_info;
    public $base_price;
    public $tax;
    public $total_price;
    public $update_type;
    public $update_flight_info;
    public $payload;


    public function __construct($payload)
    {
        if(isset($payload['url'])){
            $this->url = $payload['url'];
        }

        if(isset($payload['product'])){
            $this->product = new Product($payload['product']);
        }

        if(isset($payload['title'])){
            $this->title = $payload['title'];
        }

        if(isset($payload['is_reusable'])){
            $this->is_reusable = $payload['is_reusable'];
        }

        if(isset($payload['template_type'])){
            $this->template_type = $payload['template_type'];
        }

        $this->elements = collect();
        if(isset($payload['elements'])){
            foreach ($payload['elements'] as $element){
                $this->elements->push(new Element($element));
            }
        }

        if(isset($payload['text'])){
            $this->text = $payload['text'];
        }

        $this->buttons = collect();
        if(isset($payload['buttons'])){
            foreach ($payload['buttons'] as $button){
                $this->buttons->push(new Button($button));
            }
        }

        if(isset($payload['recipient_name'])){
            $this->recipient_name = $payload['recipient_name'];
        }

        if(isset($payload['order_number'])){
            $this->order_number = $payload['order_number'];
        }

        if(isset($payload['currency'])){
            $this->currency = $payload['currency'];
        }

        if(isset($payload['payment_method'])){
            $this->payment_method = $payload['payment_method'];
        }

        if(isset($payload['order_url'])){
            $this->order_url = $payload['order_url'];
        }

        if(isset($payload['timestamp'])){
            $this->timestamp = $payload['timestamp'];
        }

        if(isset($payload['address'])){
            $this->address = new Address($payload['address']);
        }

        if(isset($payload['summary'])){
            $this->summary = new Summary($payload['summary']);
        }

        $this->adjustments = collect();
        if(isset($payload['adjustments'])){
            foreach ($payload['adjustments'] as $adjustment){
                $this->adjustments->push(new Adjustment($adjustment));
            }
        }

        if(isset($payload['intro_message'])){
            $this->intro_message = $payload['intro_message'];
        }

        if(isset($payload['locale'])){
            $this->locale = $payload['locale'];
        }

        $this->boarding_pass = collect();
        if(isset($payload['boarding_pass'])){
            foreach ($payload['boarding_pass'] as $boarding_pass){
                $this->boarding_pass->push(new BoardingPass($boarding_pass));
            }
        }


        if(isset($payload['pnr_number'])){
            $this->pnr_number = $payload['pnr_number'];
        }

        if(isset($payload['checkin_url'])){
            $this->checkin_url = $payload['checkin_url'];
        }

        $this->flight_info = collect();
        if(isset($payload['flight_info'])){
            foreach ($payload['flight_info'] as $flight_info){
                $this->flight_info->push(new FlightInfo($flight_info));
            }
        }
        $this->passenger_info = collect();
        if(isset($payload['passenger_info'])){
            foreach ($payload['passenger_info'] as $passenger_info){
                $this->passenger_info->push(new PassengerInfo($passenger_info));
            }
        }

        $this->passenger_segment_info = collect();
        if(isset($payload['passenger_segment_info'])){
            foreach ($payload['passenger_segment_info'] as $passenger_segment_info){
                $this->passenger_segment_info->push(new PassengerSegmentInfo($passenger_segment_info));
            }
        }

        $this->price_info = collect();
        if(isset($payload['price_info'])){
            foreach ($payload['price_info'] as $price_info){
                $this->price_info->push(new PriceInfo($price_info));
            }
        }

        if(isset($payload['base_price'])){
            $this->base_price = $payload['base_price'];
        }

        if(isset($payload['tax'])){
            $this->tax = $payload['tax'];
        }

        if(isset($payload['total_price'])){
            $this->total_price = $payload['total_price'];
        }

        if(isset($payload['update_type'])){
            $this->update_type = $payload['update_type'];
        }

        if(isset($payload['update_flight_info'])){
            $this->update_flight_info = new FlightInfo($payload['update_flight_info']);
        }

        if(isset($payload['payload'])){
            $this->payload = $payload['payload'];
        }

    }

    public function toArray()
    {
        return array_filter([
            'url'=>$this->url,
            'product'=>$this->product?$this->product->toArray():null,
            'title'=>$this->title,
            'is_reusable'=>$this->is_reusable,
            'template_type'=>$this->template_type,
            'elements'=>$this->elements->toArray(),
            'text'=>$this->text,
            'buttons'=>$this->buttons->toArray(),
            'recipient_name'=>$this->recipient_name,
            'order_number'=>$this->order_number,
            'currency'=>$this->currency,
            'payment_method'=>$this->payment_method,
            'order_url'=>$this->order_url,
            'timestamp'=>$this->timestamp,
            'address'=>$this->address?$this->address->toArray():null,
            'summary'=>$this->summary?$this->summary->toArray():null,
            'adjustments'=>$this->adjustments->toArray(),
            'intro_message'=>$this->intro_message,
            'locale'=>$this->locale,
            'boarding_pass'=>$this->boarding_pass->toArray(),
            'pnr_number'=>$this->pnr_number,
            'checkin_url'=>$this->checkin_url,
            'flight_info'=>$this->flight_info->toArray(),
            'passenger_info'=>$this->passenger_info->toArray(),
            'passenger_segment_info'=>$this->passenger_segment_info->toArray(),
            'price_info'=>$this->price_info->toArray(),
            'base_price'=>$this->base_price,
            'tax'=>$this->tax,
            'total_price'=>$this->total_price,
            'update_type'=>$this->update_type,
            'update_flight_info'=>$this->update_flight_info?$this->update_flight_info->toArray():null,
            'payload'=>$this->payload,
        ]);
    }


    /**
     * addElement
     * @param $element
     * @return $this
     * @throws UnknownTypeException
     */
    public function addElement($element){
        if($element instanceof Element){
            $this->elements->push($element);
        }elseif(is_array($element)){
            $this->elements->push(new Element($element));
        }else{
            throw new UnknownTypeException('Element type error');
        }
        return $this;
    }


    /**
     * addButton
     * @param $button
     * @return $this
     * @throws UnknownTypeException
     */
    public function addButton($button){
        if($button instanceof Button){
            $this->buttons->push($button);
        }elseif(is_array($button)){
            $this->buttons->push(new Button($button));
        }else{
            throw new UnknownTypeException('Element type error');
        }
        return $this;
    }

    /**
     * addBoardingPass
     * @param $boardingPass
     * @return $this
     * @throws UnknownTypeException
     */
    public function addBoardingPass($boardingPass){
        if($boardingPass instanceof BoardingPass){
            $this->boarding_pass->push($boardingPass);
        }elseif(is_array($boardingPass)){
            $this->boarding_pass->push(new BoardingPass($boardingPass));
        }else{
            throw new UnknownTypeException('Element type error');
        }
        return $this;
    }

}
