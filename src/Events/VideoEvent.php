<?php

namespace AdolphYu\FBMessenger\Events;

use AdolphYu\FBMessenger\Models\Messaging;
use Illuminate\Queue\SerializesModels;

/**
 * Class VideoEvent
 *
 */
class VideoEvent
{
    use SerializesModels;

    public $message;

    /**
     *
     *
     * @param  Messaging  $message
     * @return void
     */
    public function __construct(Messaging $message)
    {
        $this->message = $message;
    }

}