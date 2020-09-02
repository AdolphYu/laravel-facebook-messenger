<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\OneTimeNotifReqMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class OneTimeNotifReqMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class OneTimeNotifReqMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new OneTimeNotifReqMessaging('<PSID>','<TITLE_TEXT>','<USER_DEFINED_PAYLOAD>');
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient": {
    "id":"<PSID>"
  },
  "message": {
    "attachment": {
      "type":"template",
      "payload": {
        "template_type":"one_time_notif_req",
        "title":"<TITLE_TEXT>",
        "payload":"<USER_DEFINED_PAYLOAD>"
      }
    }
  }
}',true);
    }
}
