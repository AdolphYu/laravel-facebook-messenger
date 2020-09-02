<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\IceBreakersMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class IceBreakersMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class IceBreakersMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new IceBreakersMessaging([
            [
                'question'=>'Where are you located?',
                'payload'=>'LOCATION_POSTBACK_PAYLOAD'
                ],
            [
                'question'=>'What are your hours?',
                'payload'=>'HOURS_POSTBACK_PAYLOAD'
            ],
        ]);
        $this->assertEquals($expected, $actual->toArray());
    }


    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "ice_breakers":[
     {
        "question": "Where are you located?",
        "payload": "LOCATION_POSTBACK_PAYLOAD"
     },
     {
        "question": "What are your hours?",
        "payload": "HOURS_POSTBACK_PAYLOAD"
     } 
  ]
}',true);
    }
}
