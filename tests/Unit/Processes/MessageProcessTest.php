<?php

namespace AdolphYu\FBMessenger\Tests\Processes;


use AdolphYu\FBMessenger\Events\Message\MessageEvent;
use AdolphYu\FBMessenger\Processes\MessageProcess;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

/**
 *
 * Class MessageProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessageProcess();
        $messageProcess->handle($data);


        Event::assertDispatched(MessageEvent::class, function ($e) use ($data) {
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
                    "timestamp": 1583173666767,
                    "message": {
                        "mid": "m_toDnmD...",
                        "text": "This is where I want to go: https:\/\/youtu.be\/bbo_fZAjIhg",
                        "attachments": [
                            {
                                "type": "fallback",
                                "payload": {
                                    "url": "<ATTACHMENT_URL >",
                                    "title": "TAHITI - Heaven on Earth"
                                }
                            }
                        ]
                    }
                }
            ]
        }
    ]
}',true);
    }
}
