<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Button;
use AdolphYu\FBMessenger\Models\Messaging\ButtonTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class ButtonTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class ButtonTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $button = [
            'type'=>'web_url',
            'url'=>'https://www.messenger.com',
            'title'=>'Visit Messenger',
        ];


        $expected = self::initData();
        $actual = new ButtonTemplateMessaging('<PSID>','What do you want to do next?',[]);
        $actual->addButton(new Button($button));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new ButtonTemplateMessaging('<PSID>','What do you want to do next?',[]);
        $actual->addButton($button);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new ButtonTemplateMessaging('<PSID>','What do you want to do next?',[$button]);
        $this->assertEquals($expected, $actual->toArray());

    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient":{
    "id":"<PSID>"
  },
  "message":{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"button",
        "text":"What do you want to do next?",
        "buttons":[
          {
            "type":"web_url",
            "url":"https://www.messenger.com",
            "title":"Visit Messenger"
          }
        ]
      }
    }
  }
}',true);
    }
}
