<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Messaging\GenericTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class GenericTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class GenericTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $element = [
            'title'=>'Welcome!',
            'image_url'=>'https://petersfancybrownhats.com/company_image.png',
            'subtitle'=>'We have the right hat for everyone.',
            'default_action'=>[
                'type'=>'web_url',
                'url'=>'https://petersfancybrownhats.com/view?item=103',
                'messenger_extensions'=>false,
                'webview_height_ratio'=>'tall',
                'fallback_url'=>'https://petersfancybrownhats.com/',
            ],
            'buttons'=>[
                [
                    'type'=>'web_url',
                    'url'=>'https://petersfancybrownhats.com',
                    'title'=>'View Website',
                ],
                [
                    'type'=>'postback',
                    'title'=>'Start Chatting',
                    'payload'=>'DEVELOPER_DEFINED_PAYLOAD',
                ],
            ]
        ];

        $expected = self::initData();
        $actual = new GenericTemplateMessaging('<PSID>',[]);
        $actual->addElement(new Element($element));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new GenericTemplateMessaging('<PSID>',[]);
        $actual->addElement($element);
        $this->assertEquals($expected, $actual->toArray());


        $actual = new GenericTemplateMessaging('<PSID>',[$element]);
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
        "template_type":"generic",
        "elements":[
           {
            "title":"Welcome!",
            "image_url":"https://petersfancybrownhats.com/company_image.png",
            "subtitle":"We have the right hat for everyone.",
            "default_action": {
              "type": "web_url",
              "url": "https://petersfancybrownhats.com/view?item=103",
              "messenger_extensions": false,
              "webview_height_ratio": "tall",
              "fallback_url": "https://petersfancybrownhats.com/"
            },
            "buttons":[
              {
                "type":"web_url",
                "url":"https://petersfancybrownhats.com",
                "title":"View Website"
              },{
                "type":"postback",
                "title":"Start Chatting",
                "payload":"DEVELOPER_DEFINED_PAYLOAD"
              }              
            ]      
          }
        ]
      }
    }
  }
}',true);
    }
}
