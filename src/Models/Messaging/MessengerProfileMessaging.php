<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;

class MessengerProfileMessaging extends Messaging
{
    public $route = 'me/messenger_profile';
    public $method = FBMSG::TYPE_POST;

    public $get_started;
    public $greeting;
    public $ice_breakers;
    public $persistent_menu;
    public $whitelisted_domains;
    public $account_linking_url;

    /**
     * MessengerProfileMessaging constructor.
     * @param $ice_breakers
     */
    public function __construct($properties)
    {
        $this->get_started = $properties['get_started'];
        $this->greeting = $properties['greeting'];
        $this->ice_breakers = $properties['ice_breakers'];
        $this->persistent_menu = $properties['persistent_menu'];
        $this->whitelisted_domains = $properties['whitelisted_domains'];
        $this->account_linking_url = $properties['account_linking_url'];
    }

    public function toArray()
    {
        return array_filter([
            'get_started'=>$this->get_started,
            'greeting'=>$this->greeting,
            'ice_breakers'=>$this->ice_breakers,
            'persistent_menu'=>$this->persistent_menu,
            'whitelisted_domains'=>$this->whitelisted_domains,
            'account_linking_url'=>$this->account_linking_url,
        ]);
    }
}
