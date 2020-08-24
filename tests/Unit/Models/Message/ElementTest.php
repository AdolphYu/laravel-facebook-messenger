<?php

namespace AdolphYu\FBMessenger\Tests\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Element;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

/**
 *
 * Class ElementTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class ElementTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $expected = self::initData();
        $actual = new Element($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * initData
     * @return array
     */
    public static function initData(){
        return [
            'id' => 1,
            'retailer_id' => 1,
            'image_url' => 1,
            'title' => 1,
            'subtitle' => 1,
        ];
    }
}
