<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Messaging\MediaTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class MediaTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class MediaTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $element = [
            'media_type'=>'image',
            'url'=>'<FACEBOOK_URL>'
        ];

        $expected = self::initData();
        $actual = new MediaTemplateMessaging('<PSID>',[]);
        $actual->addElement(new Element($element));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new MediaTemplateMessaging('<PSID>',[]);
        $actual->addElement($element);
        $this->assertEquals($expected, $actual->toArray());


        $actual = new MediaTemplateMessaging('<PSID>',[$element]);
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
    "attachment": {
      "type": "template",
      "payload": {
         "template_type": "media",
         "elements": [
            {
               "media_type": "image",
               "url": "<FACEBOOK_URL>"
            }
         ]
      }
    }    
  }
}',true);
    }
}
