<?php

namespace AdolphYu\FBMessenger\Events;

use AdolphYu\FBMessenger\Models\Messaging;
use Illuminate\Queue\SerializesModels;

/**
 * Class QuickReplyEvent
 *
 */
class QuickReplyEvent
{
    use SerializesModels;

    public $message;

    /**
     * 创建一个新的事件实例.
     *
     * @param  Messaging  $message
     * @return void
     */
    public function __construct(Messaging $message)
    {
        $this->message = $message;
    }

}
