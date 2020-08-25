<?php

namespace AdolphYu\FBMessenger\Tests\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Attachment;
use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Message\PersistentMenu;
use AdolphYu\FBMessenger\Models\Message\Product;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

/**
 *
 * Class PersistentMenuTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class PersistentMenuTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new PersistentMenu($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
            "locale": "default",
            "composer_input_disabled": false,
            "call_to_actions": [
                {
                    "type": "postback",
                    "title": "Talk to an agent",
                    "payload": "CARE_HELP"
                },
                {
                    "type": "postback",
                    "title": "Outfit suggestions",
                    "payload": "CURATION"
                },
                {
                    "type": "web_url",
                    "title": "Shop now",
                    "url": "https://www.originalcoastclothing.com/",
                    "webview_height_ratio": "full"
                }
            ]
        }',true);
    }
}
