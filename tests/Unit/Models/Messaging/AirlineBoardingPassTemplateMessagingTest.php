<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Messaging\AirlineBoardingPassTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class AirlineBoardingPassTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class AirlineBoardingPassTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $payload = json_decode('{
        "template_type": "airline_boardingpass",
        "intro_message": "You are checked in.",
        "locale": "en_US",
        "boarding_pass": [
          {
            "passenger_name": "SMITH\/NICOLAS",
            "pnr_number": "CG4X7U",
            "seat": "74J",            
            "logo_image_url": "https:\/\/www.example.com\/en\/logo.png",
            "header_image_url": "https:\/\/www.example.com\/en\/fb\/header.png",
            "qr_code": "M1SMITH\/NICOLAS  CG4X7U nawouehgawgnapwi3jfa0wfh",
            "above_bar_code_image_url": "https:\/\/www.example.com\/en\/PLAT.png",
            "auxiliary_fields": [
              {
                "label": "Terminal",
                "value": "T1"
              },
              {
                "label": "Departure",
                "value": "30OCT 19:05"
              }
            ],
            "secondary_fields": [
              {
                "label": "Boarding",
                "value": "18:30"
              },
              {
                "label": "Gate",
                "value": "D57"
              },
              {
                "label": "Seat",
                "value": "74J"
              },
              {
                "label": "Sec.Nr.",
                "value": "003"
              }
            ],
            "flight_info": {
              "flight_number": "KL0642",
              "departure_airport": {
                "airport_code": "JFK",
                "city": "New York",
                "terminal": "T1",
                "gate": "D57"
              },
              "arrival_airport": {
                "airport_code": "AMS",
                "city": "Amsterdam"
              },
              "flight_schedule": {
                "departure_time": "2016-01-02T19:05",
                "arrival_time": "2016-01-05T17:30"
              }
            }
          }
        ]
      }',true);

        $expected = self::initData();
        $actual = new AirlineBoardingPassTemplateMessaging('<PSID>',[]);
        $actual->setPayload(new Payload($payload));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineBoardingPassTemplateMessaging('<PSID>',[]);
        $actual->setPayload($payload);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineBoardingPassTemplateMessaging('<PSID>',$payload);
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
        "template_type": "airline_boardingpass",
        "intro_message": "You are checked in.",
        "locale": "en_US",
        "boarding_pass": [
          {
            "passenger_name": "SMITH\/NICOLAS",
            "pnr_number": "CG4X7U",
            "seat": "74J",            
            "logo_image_url": "https:\/\/www.example.com\/en\/logo.png",
            "header_image_url": "https:\/\/www.example.com\/en\/fb\/header.png",
            "qr_code": "M1SMITH\/NICOLAS  CG4X7U nawouehgawgnapwi3jfa0wfh",
            "above_bar_code_image_url": "https:\/\/www.example.com\/en\/PLAT.png",
            "auxiliary_fields": [
              {
                "label": "Terminal",
                "value": "T1"
              },
              {
                "label": "Departure",
                "value": "30OCT 19:05"
              }
            ],
            "secondary_fields": [
              {
                "label": "Boarding",
                "value": "18:30"
              },
              {
                "label": "Gate",
                "value": "D57"
              },
              {
                "label": "Seat",
                "value": "74J"
              },
              {
                "label": "Sec.Nr.",
                "value": "003"
              }
            ],
            "flight_info": {
              "flight_number": "KL0642",
              "departure_airport": {
                "airport_code": "JFK",
                "city": "New York",
                "terminal": "T1",
                "gate": "D57"
              },
              "arrival_airport": {
                "airport_code": "AMS",
                "city": "Amsterdam"
              },
              "flight_schedule": {
                "departure_time": "2016-01-02T19:05",
                "arrival_time": "2016-01-05T17:30"
              }
            }
          }
        ]
      }
    }
  }
}',true);
    }
}
