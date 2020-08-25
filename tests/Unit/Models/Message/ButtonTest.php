<?php

namespace AdolphYu\FBMessenger\Tests\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Button\AccountLinkButton;
use AdolphYu\FBMessenger\Models\Message\Button\AccountUnlinkButton;
use AdolphYu\FBMessenger\Models\Message\Button\GamePlayButton;
use AdolphYu\FBMessenger\Models\Message\Button\PhoneNumberButton;
use AdolphYu\FBMessenger\Models\Message\Button\PostbackButton;
use AdolphYu\FBMessenger\Models\Message\Button\WebUrlButton;
use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Models\Message\Postback;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

/**
 *
 * Class ButtonTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class ButtonTest extends TestCase
{

    /**
     * testPostbackButtonToArray
     */
    public function testPostbackButtonToArray()
    {
        $expected = self::initData('Postback');
        $actual = new PostbackButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testWebUrlButtonToArray
     */
    public function testWebUrlButtonToArray()
    {
        $expected = self::initData('WebUrl');
        $actual = new WebUrlButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testWebUrlButtonToArray
     */
    public function testPhoneNumberButtonToArray()
    {
        $expected = self::initData('PhoneNumber');
        $actual = new PhoneNumberButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testWebUrlButtonToArray
     */
    public function testGamePlayButtonToArray()
    {
        $expected = self::initData('GamePlay');
        $actual = new GamePlayButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testWebUrlButtonToArray
     */
    public function testAccountLinkButtonToArray()
    {
        $expected = self::initData('AccountLink');
        $actual = new AccountLinkButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testWebUrlButtonToArray
     */
    public function testAccountUnlinkButtonToArray()
    {
        $expected = self::initData('AccountUnlink');
        $actual = new AccountUnlinkButton($expected);
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData($key){
        $result = [];
        switch ($key) {
            case 'Postback':
                $result = json_decode('{
            "type":"postback",
            "title":"Postback Button",
            "payload":"DEVELOPER_DEFINED_PAYLOAD"
          }',true);
                break;
            case 'WebUrl':
                $result = json_decode('{
            "type":"web_url",
            "url":"https://www.messenger.com/",
            "title":"URL Button",
            "webview_height_ratio": "full"
          }',true);
                break;
            case 'PhoneNumber':
                $result = json_decode('{
            "type":"phone_number",
            "title":"Call Representative",
            "payload":"+15105551234"
          }',true);
                break;
            case 'GamePlay':
                $result = json_decode('{
            "type":"game_play",
            "title":"Play",
            "payload":"SERIALIZED_JSON_PAYLOAD",
            "game_metadata": { 
              "player_id": "4590736473645"
            }
          }',true);
                break;
            case 'AccountLink':
                $result = json_decode('{
            "type": "account_link",
            "url": "https://www.example.com/authorize"
          }',true);
                break;
            case 'AccountUnlink':
                $result = json_decode('{
            "type": "account_unlink"
          }',true);
                break;
        }
        return $result;
    }
}
