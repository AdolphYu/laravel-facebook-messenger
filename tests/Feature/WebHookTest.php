<?php

namespace AdolphYu\FBMessenger\Tests\Feature;

use AdolphYu\FBMessenger\Tests\TestCase;



/**
 *
 * Class WebHookTest
 * @package AdolphYu\FBMessenger\Tests
 */
class WebHookTest extends TestCase
{

    /**
     * testVerificationNotFound
     */
    public function testVerificationNotFound()
    {
        $this->get(route('fb-messenger.verification'))->assertStatus(422);
    }

    /**
     * testVerificationPass
     */
    public function testVerificationPass()
    {
        $this->get(route('fb-messenger.verification',[
            'hub_mode'=>'subscribe',
            'hub_verify_token'=>config('fb-messenger.verify_token'),
            'hub_challenge'=>'subscribe'
        ]))->assertOk();
    }

    /**
     * testVerificationPass
     */
    public function testReceive()
    {

        $this->post(route('fb-messenger.receive'))->assertOk();
    }

}
