<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\IceBreakersGetMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class IceBreakersMessagingGetTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class IceBreakersMessagingGetTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new IceBreakersGetMessaging();
        $this->assertEquals($expected, $actual->toArray());
    }


    /**
     * initData
     * @return array
     */
    public static function initData(){
        return [
            'fields'=>'ice_breakers'
        ];
    }
}
