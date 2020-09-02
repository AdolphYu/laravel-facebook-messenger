<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\TakeThreadControlMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class TakeThreadControlMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class TakeThreadControlMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new TakeThreadControlMessaging('<PSID>','String to pass to the secondary receiver');
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient":{"id":"<PSID>"},
  "metadata":"String to pass to the secondary receiver" 
}',true);
    }
}
