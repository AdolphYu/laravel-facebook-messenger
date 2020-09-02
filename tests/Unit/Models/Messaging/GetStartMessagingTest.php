<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\GetStartMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class GetStartMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class GetStartMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new GetStartMessaging('<postback_payload>');
        $this->assertEquals($expected, $actual->toArray());

    }


    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "get_started": {"payload": "<postback_payload>"}
}',true);
    }
}
