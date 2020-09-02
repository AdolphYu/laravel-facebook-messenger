<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\IceBreakersDeleteMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class IceBreakersDeleteMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class IceBreakersDeleteMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new IceBreakersDeleteMessaging();
        $this->assertEquals($expected, $actual->toArray());
    }


    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "fields": [
    "ice_breakers"
  ]
}',true);
    }
}
