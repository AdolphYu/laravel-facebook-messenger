<?php

namespace AdolphYu\FBMessenger\Events\Message;


use AdolphYu\FBMessenger\Models\Messaging\MessageMessaging;
use Illuminate\Queue\SerializesModels;

/**
 * Class MessagingEvent
 *
 */
class MessageEvent
{
    use SerializesModels;

    public $data;

    /**
     * 创建一个新的事件实例.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

}
