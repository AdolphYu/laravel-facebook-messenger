<?php

namespace AdolphYu\FBMessenger\Tests\Processes;


use AdolphYu\FBMessenger\Events\MessageDeliveryEvent;
use AdolphYu\FBMessenger\Events\MessageReadEvent;
use AdolphYu\FBMessenger\Processes\MessageDeliveryProcess;
use AdolphYu\FBMessenger\Processes\MessageReadProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageReadTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageReadTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessageReadProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessageReadEvent::class, function ($e) use ($data) {
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
                    "read":{
                          "watermark":1458668856253
                     }
                }
            ]
        }
    ]
}',true);
    }
}
