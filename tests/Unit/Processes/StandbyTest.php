<?php

namespace AdolphYu\FBMessenger\Tests\Processes;


use AdolphYu\FBMessenger\Events\MessageDeliveryEvent;
use AdolphYu\FBMessenger\Events\MessageReadEvent;
use AdolphYu\FBMessenger\Events\MessagingReferralEvent;
use AdolphYu\FBMessenger\Events\StandbyEvent;
use AdolphYu\FBMessenger\Processes\MessageDeliveryProcess;
use AdolphYu\FBMessenger\Processes\MessageReadProcess;
use AdolphYu\FBMessenger\Processes\MessagingReferralProcess;
use AdolphYu\FBMessenger\Processes\StandbyProcess;
use AdolphYu\FBMessenger\Tests\TestCase;

use Illuminate\Support\Facades\Event;


/**
 *
 * Class StandbyTest
 * @package AdolphYu\FBMessenger\Tests\Processes
 */
class StandbyTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        Event::fake();
        $data = $this->initData();

        $messageProcess = new StandbyProcess();
        $messageProcess->handle($data);

        Event::assertDispatched(StandbyEvent::class, function ($e) use ($data) {
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
            "standby":[
                {
                  "sender":{
                    "id":"<USER_ID>"
                  },
                  "recipient":{
                    "id":"<PAGE_ID>"
                  }
                }
            ]
        }
    ]
}',true);
    }
}
