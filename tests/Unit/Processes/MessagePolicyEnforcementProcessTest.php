<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Events\MessagingOptinEvent;
use AdolphYu\FBMessenger\Events\MessagingPolicyEnforcementEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Processes\MessagingPolicyEnforcementProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessagePolicyEnforcementProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessagePolicyEnforcementProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessagingPolicyEnforcementProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessagingPolicyEnforcementEvent::class, function ($e) use ($data) {
            return $e->data['object'] === $data['object'];
        });


    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
    "object": "page",
    "entry": [
        {
            "id": "<PAGE_ID>",
            "time": 1583173667623,
            "messaging": [
                {
                    "sender": {
                        "id": "<PSID>"
                    },
                    "recipient": {
                        "id": "<PAGE_ID>"
                    },
                    "policy_enforcement": {
                        "action": "block",
                        "reason": "The bot violated our Platform Policies (https://developers.facebook.com/devpolicy/#messengerplatform). Common violations include sending out excessive spammy messages or being non-functional."
                    }
                }
            ]
        }
    ]
}',true);
    }
}
