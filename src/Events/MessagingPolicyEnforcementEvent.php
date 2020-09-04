<?php

namespace AdolphYu\FBMessenger\Events;


use Illuminate\Queue\SerializesModels;

/**
 * Class MessagingOptinEvent
 *
 */
class MessagingPolicyEnforcementEvent
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
