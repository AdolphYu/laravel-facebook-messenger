<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\QuickReply;
use AdolphYu\FBMessenger\Models\Messaging\MessageMessaging;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class TextMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class TextMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new TextMessaging('<PSID>','Pick a color:');
        $actual->messaging_type=MessageMessaging::MESSAGING_TYPE_RESPONSE;
        $actual->addQuickReply(new QuickReply([
            'content_type'=>'text',
            'title'=>'Red',
            'payload'=>'<POSTBACK_PAYLOAD>',
            'image_url'=>'http://example.com/img/red.png',
        ]))->addQuickReply(new QuickReply([
            'content_type'=>'text',
            'title'=>'Green',
            'payload'=>'<POSTBACK_PAYLOAD>',
            'image_url'=>'http://example.com/img/green.png',
        ]));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new TextMessaging('<PSID>','Pick a color:');
        $actual->messaging_type=MessageMessaging::MESSAGING_TYPE_RESPONSE;
        $actual->addQuickReply([
            'content_type'=>'text',
            'title'=>'Red',
            'payload'=>'<POSTBACK_PAYLOAD>',
            'image_url'=>'http://example.com/img/red.png',
        ])->addQuickReply([
            'content_type'=>'text',
            'title'=>'Green',
            'payload'=>'<POSTBACK_PAYLOAD>',
            'image_url'=>'http://example.com/img/green.png',
        ]);
        $this->assertEquals($expected, $actual->toArray());

        $actual->setTag('ACCOUNT_UPDATE');
        $expected = array_merge($expected,['messaging_type'=>'MESSAGE_TAG','tag'=>'ACCOUNT_UPDATE']);
        $this->assertEquals($expected, $actual->toArray());

        $actual->setPersona('111');
        $expected = array_merge($expected,['persona_id'=>'111']);
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
  "messaging_type": "RESPONSE",
  "message":{
    "text": "Pick a color:",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Red",
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/red.png"
      },{
        "content_type":"text",
        "title":"Green",
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }
}',true);
    }
}
