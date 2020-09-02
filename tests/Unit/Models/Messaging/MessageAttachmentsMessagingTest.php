<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\MessageAttachmentsMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class MessageAttachmentsMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class MessageAttachmentsMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new MessageAttachmentsMessaging('image','http://www.messenger-rocks.com/image.jpg');
        $this->assertEquals($expected, $actual->toArray());

    }


    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "message":{
    "attachment":{
      "type":"image", 
      "payload":{
        "is_reusable": true,
        "url":"http://www.messenger-rocks.com/image.jpg"
      }
    }
  }
}',true);
    }
}
