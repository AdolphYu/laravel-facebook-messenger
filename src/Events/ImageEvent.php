<?php

namespace AdolphYu\FBMessenger\Events;

use AdolphYu\FBMessenger\Models\Messaging;
use App\FB\Foundation\Messages\Receive\Image;
use Illuminate\Queue\SerializesModels;

/**
 * Class ImageEvent
 *
 */
class ImageEvent
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
