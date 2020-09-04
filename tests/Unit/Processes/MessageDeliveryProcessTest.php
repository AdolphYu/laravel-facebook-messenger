<?php

namespace AdolphYu\FBMessenger\Tests\Processes;


use AdolphYu\FBMessenger\Events\MessageDeliveryEvent;
use AdolphYu\FBMessenger\Processes\MessageDeliveryProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageDeliveryProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageDeliveryProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessageDeliveryProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessageDeliveryEvent::class, function ($e) use ($data) {
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
                    "delivery":{
                        "mids":[
                            "mid.1458668856218:ed81099e15d3f4f233"
                         ],
                         "watermark":1458668856253
                    }
                }
            ]
        }
    ]
}',true);
    }
}
