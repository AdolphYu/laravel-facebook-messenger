<?php

namespace AdolphYu\FBMessenger\Models\Messaging;

use AdolphYu\FBMessenger\FBMSG;
use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\User\Recipient;

class IceBreakersMessaging extends MessengerProfileMessaging
{
    public $ice_breakers;

    /**
     * IceBreakersMessaging constructor.
     * @param $ice_breakers
     */
    public function __construct($ice_breakers)
    {

        $this->ice_breakers = $ice_breakers;
    }

    public function toArray()
    {
        return [
            'ice_breakers'=>$this-> ice_breakers
        ];
    }
}
