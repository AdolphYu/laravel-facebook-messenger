<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Messaging\PersonaCreateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;

/**
 *
 * Class PersonaCreateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class PersonaCreateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {

        $expected = self::initData();
        $actual = new PersonaCreateMessaging('John Mathew','https://facebook.com/john_image.jpg');
        $this->assertEquals($expected, $actual->toArray());
    }



    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
	"name": "John Mathew",
	"profile_picture_url": "https://facebook.com/john_image.jpg"
}',true);
    }
}
