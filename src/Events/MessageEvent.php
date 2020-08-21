<?php

namespace AdolphYu\FBMessenger\Events;

use AdolphYu\FBMessenger\Models\Messaging;
use Illuminate\Queue\SerializesModels;

/**
 * Class MessageEvent
 *
 */
class MessageEvent
{
    use SerializesModels;

    public $message;

    /**
     * 创
     *
     * @param  Messaging  $message
     * @return void
     */
    public function __construct(Messaging $message)
    {
        $this->message = $message;
    }

}
