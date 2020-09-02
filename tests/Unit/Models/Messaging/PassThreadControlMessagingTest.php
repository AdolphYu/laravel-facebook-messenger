<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\PassThreadControlMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class PassThreadControlMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class PassThreadControlMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new PassThreadControlMessaging('<PSID>','123456789','String to pass to secondary receiver app');
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient":{"id":"<PSID>"},
  "target_app_id":123456789,
  "metadata":"String to pass to secondary receiver app" 
}',true);
    }
}
