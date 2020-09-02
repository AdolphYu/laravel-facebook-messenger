<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Messaging\OpenGraphTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class OpenGraphTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class OpenGraphTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $element = [
            'url'=>'https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb',
            'buttons'=>[
                [
                    'type'=>'web_url',
                    'url'=>'https://en.wikipedia.org/wiki/Rickrolling',
                    'title'=>'View More',
                ],
            ]
        ];

        $expected = self::initData();
        $actual = new OpenGraphTemplateMessaging('USER_ID',[]);
        $actual->addElement(new Element($element));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new OpenGraphTemplateMessaging('USER_ID',[]);
        $actual->addElement($element);
        $this->assertEquals($expected, $actual->toArray());


        $actual = new OpenGraphTemplateMessaging('USER_ID',[$element]);
        $this->assertEquals($expected, $actual->toArray());

    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient":{
    "id":"USER_ID"
  },
  "message":{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"open_graph",
        "elements":[
           {
            "url":"https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb",
            "buttons":[
              {
                "type":"web_url",
                "url":"https://en.wikipedia.org/wiki/Rickrolling",
                "title":"View More"
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
