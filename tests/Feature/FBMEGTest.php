<?php

namespace AdolphYu\FBMessenger\Tests\Feature;



use AdolphYu\FBMessenger\Facades\FBMSG;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;
use Illuminate\Support\Facades\Cache;



/**
 *
 * Class FBMEGTest
 * @package AdolphYu\FBMessenger\Tests
 */
class FBMEGTest extends TestCase
{

    /**
     * testSend
     */
    public function testSend()
    {
        $messaging = new TextMessaging('1',2);
        FBMSG::shouldReceive('send')
            ->times(1)
            ->with($messaging)
            ->andReturn([222]);
       FBMSG::send($messaging);
    }

    /**
     * testReceive
     */
    public function testReceive()
    {

        //How to trigger an event
        FBMSG::shouldReceive('receive')
            ->times(1)
            ->with($this->app->get('request'))
            ->andReturn(null);
        FBMSG::receive($this->app->get('request'));
    }


}
