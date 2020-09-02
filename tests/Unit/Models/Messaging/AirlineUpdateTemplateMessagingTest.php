<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Messaging\AirlineUpdateTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class AirlineUpdateTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class AirlineUpdateTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $payload = json_decode('{
        "template_type": "airline_update",
        "intro_message": "Your flight is delayed",
        "update_type": "delay",
        "locale": "en_US",
        "pnr_number": "CF23G2",
        "update_flight_info": {
          "flight_number": "KL123",
          "departure_airport": {
            "airport_code": "SFO",
            "city": "San Francisco",
            "terminal": "T4",
            "gate": "G8"
          },
          "arrival_airport": {
            "airport_code": "AMS",
            "city": "Amsterdam",
            "terminal": "T4",
            "gate": "G8"
          },
          "flight_schedule": {
            "boarding_time": "2015-12-26T10:30",
            "departure_time": "2015-12-26T11:30",
            "arrival_time": "2015-12-27T07:30"
          }
        }
      }',true);

        $expected = self::initData();
        $actual = new AirlineUpdateTemplateMessaging('<PSID>',[]);
        $actual->setPayload(new Payload($payload));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineUpdateTemplateMessaging('<PSID>',[]);
        $actual->setPayload($payload);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineUpdateTemplateMessaging('<PSID>',$payload);
        $this->assertEquals($expected, $actual->toArray());

    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient": {
    "id": "<PSID>"
  },
  "message": {
    "attachment": {
      "type": "template",
      "payload": {
        "template_type": "airline_update",
        "intro_message": "Your flight is delayed",
        "update_type": "delay",
        "locale": "en_US",
        "pnr_number": "CF23G2",
        "update_flight_info": {
          "flight_number": "KL123",
          "departure_airport": {
            "airport_code": "SFO",
            "city": "San Francisco",
            "terminal": "T4",
            "gate": "G8"
          },
          "arrival_airport": {
            "airport_code": "AMS",
            "city": "Amsterdam",
            "terminal": "T4",
            "gate": "G8"
          },
          "flight_schedule": {
            "boarding_time": "2015-12-26T10:30",
            "departure_time": "2015-12-26T11:30",
            "arrival_time": "2015-12-27T07:30"
          }
        }
      }
    }
  }
}',true);
    }
}
