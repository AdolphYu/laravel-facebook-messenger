<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessagingAppRoleEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Events\MessagingHandoverEvent;
use AdolphYu\FBMessenger\Events\MessagingPassThreadControlEvent;
use AdolphYu\FBMessenger\Events\MessagingRequestThreadControlEvent;
use AdolphYu\FBMessenger\Events\MessagingTakeThreadControlEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingHandoverProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageHandoverProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageHandoverProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessagingHandoverProcess();
        $messageProcess->handle($data[0]);

        Event::assertDispatched(MessagingPassThreadControlEvent::class, function ($e) use ($data) {
            return $e->data['object'] === $data[0]['object'];
        });

        $messageProcess->handle($data[1]);
        Event::assertDispatched(MessagingTakeThreadControlEvent::class, function ($e) use ($data) {
            return $e->data['object'] === $data[1]['object'];
        });

        $messageProcess->handle($data[2]);
        Event::assertDispatched(MessagingRequestThreadControlEvent::class, function ($e) use ($data) {
            return $e->data['object'] === $data[2]['object'];
        });

        $messageProcess->handle($data[3]);
        Event::assertDispatched(MessagingAppRoleEvent::class, function ($e) use ($data) {
            return $e->data['object'] === $data[3]['object'];
        });



    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        $data [0] =  json_decode('{
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
                    "pass_thread_control":{
                        "new_owner_app_id":"123456789",
                        "metadata":"Additional content that the caller wants to set"
                    }
                }
            ]
        }
    ]
}',true);

        $data [1] =  json_decode('{
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
                    "take_thread_control":{
                        "previous_owner_app_id":"123456789",
                        "metadata":"additional content that the caller wants to set"
                    }
                }
            ]
        }
    ]
}',true);

        $data [2] =  json_decode('{
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
                    "request_thread_control":{
                        "requested_owner_app_id":123456789,
                        "metadata":"additional content that the caller wants to set"
                    }
                }
            ]
        }
    ]
}',true);

        $data [3] =  json_decode('{
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
                    "app_roles":{
                        "123456789":["primary_receiver"]
                    }
                }
            ]
        }
    ]
}',true);

        return $data;
    }
}
