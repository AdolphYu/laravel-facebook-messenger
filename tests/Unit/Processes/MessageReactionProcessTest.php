<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessageReactionEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Events\MessagingOptinEvent;
use AdolphYu\FBMessenger\Events\MessagingPolicyEnforcementEvent;
use AdolphYu\FBMessenger\Events\MessagingPostbackEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessageReactionProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Processes\MessagingPolicyEnforcementProcess;
use AdolphYu\FBMessenger\Processes\MessagingPostbackProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageReactionProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageReactionProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessageReactionProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessageReactionEvent::class, function ($e) use ($data) {
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
                    "reaction":{
                         "reaction": "smile|angry|sad|wow|love|like|dislike|other",
                         "emoji": "xx",
                         "action": "react|unreact",
                         "mid": "<MID_OF_ReactedTo_Message>"
                    }
                }
            ]
        }
    ]
}',true);
    }
}
