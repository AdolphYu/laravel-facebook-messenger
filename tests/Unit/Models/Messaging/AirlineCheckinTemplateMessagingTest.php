<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Messaging\AirlineCheckinTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class AirlineCheckinTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class AirlineCheckinTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $payload = json_decode('{
        "template_type": "airline_checkin",
        "intro_message": "Check-in is available now.",
        "locale": "en_US",        
        "pnr_number": "ABCDEF",
        "checkin_url": "https:\/\/www.airline.com\/check-in",  
        "flight_info": [
          {
            "flight_number": "f001",
            "departure_airport": {
              "airport_code": "SFO",
              "city": "San Francisco",
              "terminal": "T4",
              "gate": "G8"
            },
            "arrival_airport": {
              "airport_code": "SEA",
              "city": "Seattle",
              "terminal": "T4",
              "gate": "G8"
            },
            "flight_schedule": {
              "boarding_time": "2016-01-05T15:05",
              "departure_time": "2016-01-05T15:45",
              "arrival_time": "2016-01-05T17:30"
            }
          }
        ]
      }',true);

        $expected = self::initData();
        $actual = new AirlineCheckinTemplateMessaging('<PSID>',[]);
        $actual->setPayload(new Payload($payload));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineCheckinTemplateMessaging('<PSID>',[]);
        $actual->setPayload($payload);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineCheckinTemplateMessaging('<PSID>',$payload);
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
        "template_type": "airline_checkin",
        "intro_message": "Check-in is available now.",
        "locale": "en_US",        
        "pnr_number": "ABCDEF",
        "checkin_url": "https:\/\/www.airline.com\/check-in",  
        "flight_info": [
          {
            "flight_number": "f001",
            "departure_airport": {
              "airport_code": "SFO",
              "city": "San Francisco",
              "terminal": "T4",
              "gate": "G8"
            },
            "arrival_airport": {
              "airport_code": "SEA",
              "city": "Seattle",
              "terminal": "T4",
              "gate": "G8"
            },
            "flight_schedule": {
              "boarding_time": "2016-01-05T15:05",
              "departure_time": "2016-01-05T15:45",
              "arrival_time": "2016-01-05T17:30"
            }
          }
        ]
      }
    }
  }
}',true);
    }
}
