<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Messaging\ProductTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class ProductTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class ProductTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {



        $expected = self::initData();
        $actual = new ProductTemplateMessaging('<PSID>',[]);
        $actual->addElement(new Element(['id'=>'<PRODUCT_ID_1>']))->addElement(new Element(['id'=>'<PRODUCT_ID_2>']));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new ProductTemplateMessaging('<PSID>',[]);
        $actual->addElement(['id'=>'<PRODUCT_ID_1>'])->addElement(['id'=>'<PRODUCT_ID_2>']);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new ProductTemplateMessaging('<PSID>',[
            [
                'id'=>'<PRODUCT_ID_1>',
            ],
            [
                'id'=>'<PRODUCT_ID_2>',
            ]

        ]);
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
        "payload": {
          "template_type": "product",
          "elements": [
            {
              "id": "<PRODUCT_ID_1>"
            },
            {
              "id": "<PRODUCT_ID_2>"
            }
         ]
      }
    }
  }
}',true);
    }
}
