<?php

namespace AdolphYu\FBMessenger\Tests\Processes;



use AdolphYu\FBMessenger\Events\MessageEchoEvent;
use AdolphYu\FBMessenger\Events\MessagingGamePlayEvent;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class MessageGamePlayProcessTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class MessageGamePlayProcessTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new MessagingGamePlayProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(MessagingGamePlayEvent::class, function ($e) use ($data) {
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
                    "game_play": {
                        "game_id": "<GAME-APP-ID>",
                        "player_id": "<PLAYER-ID>",
                        "context_type": "<CONTEXT-TYPE:SOLO|THREAD>",
                        "context_id": "<CONTEXT-ID>", 
                        "score": "<SCORE-NUM>", 
                        "payload": "<PAYLOAD>" 
                    }
                }
            ]
        }
    ]
}',true);
    }
}
