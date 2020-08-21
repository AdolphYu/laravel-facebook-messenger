<?php

namespace AdolphYu\FBMessenger\Tests\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Attachment;
use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Message\Product;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

class AttachmentTest extends TestCase
{

    public function testToArray()
    {
        $faker = Factory::create();
        $type = 'audio';
        $url = $faker->url;
        $actual = new Attachment([
            'type' => $type,
            'payload' => [
                'url' => $url,
            ]
        ]);

        $expected = [
            'type' => 'audio',
            'payload' => [
                'url' => $url,
            ],
        ];


        $this->assertEquals($expected, $actual->toArray());
    }
}
