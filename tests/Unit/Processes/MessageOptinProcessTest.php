<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Events\MessagingOptinEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageOptinProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageOptinProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessagingOptinProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessagingOptinEvent::class, function ($e) use ($data) {
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
                    "optin": {
                        "ref": "<PASS_THROUGH_PARAM>",
                        "user_ref": "<REF_FROM_CHECKBOX_PLUGIN>"
                    }
                }
            ]
        }
    ]
}',true);
    }
}
