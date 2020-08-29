<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use AdolphYu\FBMessenger\Models\Messaging\PassThreadControlMessaging;
use AdolphYu\FBMessenger\Models\Messaging\RequestThreadControlMessaging;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class RequestThreadControlMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class RequestThreadControlMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new RequestThreadControlMessaging('<PSID>','additional content that the caller wants to set');
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient":{"id":"<PSID>"},
  "metadata":"additional content that the caller wants to set" 
}',true);
    }
}
