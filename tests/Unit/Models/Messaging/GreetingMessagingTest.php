<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Messaging\GetStartMessaging;
use AdolphYu\FBMessenger\Models\Messaging\GreetingMessaging;
use AdolphYu\FBMessenger\Models\Messaging\MessageAttachmentsMessaging;
use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class GreetingMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class GreetingMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new GreetingMessaging([
            [
                'locale'=>'default',
                'text'=>'Hello!'
                ],
            [
                'locale'=>'en_US',
                'text'=>'Timeless apparel for the masses.'
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
  "greeting": [
    {
      "locale":"default",
      "text":"Hello!" 
    }, {
      "locale":"en_US",
      "text":"Timeless apparel for the masses."
    }
  ]
}',true);
    }
}