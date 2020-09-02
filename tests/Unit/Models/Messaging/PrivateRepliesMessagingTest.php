<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\MessageMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class PrivateRepliesMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class PrivateRepliesMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new MessageMessaging($expected);
        $this->assertEquals($expected, $actual->toArray());

    }


    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
    "recipient": {
        "post_id": "542998526103632_461184817813069"
    },
    
    "message": {
      "attachment":{
        "type":"template",
        "payload":{
          "template_type":"button",
          "text":"Of course, what is your budget for the gift?",
          "buttons":[
              {
                  "content_type": "postback",
                  "title": "LESS THAN $20",
                  "payload": "GIFT_BUDGET_20_PAYLOAD"
              },
              {
                  "content_type": "postback",
                  "title": "$20 TO $50",
                  "payload": "GIFT_BUDGET_20_TO_50_PAYLOAD"
              },
              {
                  "content_type": "postback",
                  "title": "MORE THAN $50",
                  "payload": "GIFT_BUDGET_50_PAYLOAD"
              }
          ]
        }
      }
    }
}',true);
    }
}
