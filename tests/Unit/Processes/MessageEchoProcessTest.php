<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageEchoProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageEchoProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessageEchoProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessageEchoEvent::class, function ($e) use ($data) {
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
                    "message":{
                        "is_echo":true,
                        "app_id":1517776481860111,
                        "metadata": "<DEVELOPER_DEFINED_METADATA_STRING>",
                        "mid":"mid.1457764197618:41d102a3e1ae206a38"
                     }
                }
            ]
        }
    ]
}',true);
    }
}
