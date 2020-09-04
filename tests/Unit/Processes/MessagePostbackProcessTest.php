<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Events\MessagingOptinEvent;
use AdolphYu\FBMessenger\Events\MessagingPolicyEnforcementEvent;
use AdolphYu\FBMessenger\Events\MessagingPostbackEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Processes\MessagingPolicyEnforcementProcess;
use AdolphYu\FBMessenger\Processes\MessagingPostbackProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessagePostbackProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessagePostbackProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessagingPostbackProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessagingPostbackEvent::class, function ($e) use ($data) {
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
                    "postback":{
                        "title": "<TITLE_FOR_THE_CTA>",  
                        "payload": "<USER_DEFINED_PAYLOAD>",
                        "referral": {
                          "ref": "<USER_DEFINED_REFERRAL_PARAM>",
                          "source": "<SHORTLINK>",
                          "type": "OPEN_THREAD"
                        }
                    }
                }
            ]
        }
    ]
}',true);
    }
}
