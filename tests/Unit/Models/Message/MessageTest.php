<?php

namespace AdolphYu\FBMessenger\Tests\Models\Message;

use AdolphYu\FBMessenger\Models\Message\Message;
use AdolphYu\FBMessenger\Tests\TestCase;
use Faker\Factory;

/**
 *
 * Class MessageTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class MessageTest extends TestCase
{

    /**
     * testQuickRepliesToArray
     */
    public function testQuickRepliesToArray()
    {
        $expected = self::initData('QuickReplies');
        $actual = new Message($expected);
        $this->assertEquals($expected, $actual->toArray());
    }


    /**
     * testGenericTemplateToArray
     */
    public function testGenericTemplateToArray()
    {
        $expected = self::initData('GenericTemplate');
        $actual = new Message($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testButtonTemplateToArray
     */
    public function testButtonTemplateToArray()
    {
        $expected = self::initData('ButtonTemplate');
        $actual = new Message($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testOpenGraphTemplateToArray
     */
    public function testOpenGraphTemplateToArray()
    {
        $expected = self::initData('OpenGraphTemplate');
        $actual = new Message($expected);

        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testMediaTemplateToArray
     */
    public function testMediaTemplateToArray()
    {
        $expected = self::initData('MediaTemplate');
        $actual = new Message($expected);
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testMediaTemplateToArray
     */
    public function testReceiptTemplateToArray()
    {
        $expected = self::initData('ReceiptTemplate');
        $actual = new Message($expected);
//        dd($expected, $actual->toArray());
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testAirlineBoardingpassTemplateToArray
     */
    public function testAirlineBoardingpassTemplateToArray()
    {
        $expected = self::initData('AirlineBoardingpass');
        $actual = new Message($expected);
//        dd($expected, $actual->toArray());
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testAirlineCheckinTemplateToArray
     */
    public function testAirlineCheckinTemplateToArray()
    {
        $expected = self::initData('AirlineCheckin');
        $actual = new Message($expected);
        $this->assertEquals($expected, $actual->toArray());
    }


    /**
     * testAirlineItineraryTemplateToArray
     */
    public function testAirlineItineraryTemplateToArray()
    {
        $expected = self::initData('AirlineItinerary');
        $actual = new Message($expected);
//        dd($expected, $actual->toArray());
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testAirlineUpdateTemplateToArray
     */
    public function testAirlineUpdateTemplateToArray()
    {
        $expected = self::initData('AirlineUpdate');
        $actual = new Message($expected);
//        dd($expected, $actual->toArray());
        $this->assertEquals($expected, $actual->toArray());
    }

    /**
     * testProductTemplateToArray
     */
    public function testProductTemplateToArray()
    {
        $expected = self::initData('Product');
        $actual = new Message($expected);
//        dd($expected, $actual->toArray());
        $this->assertEquals($expected, $actual->toArray());
    }





    /**
     * initData
     * @return array
     */
    public static function initData($key){
        $result = [];
        switch ($key){
            case 'QuickReplies':
                $result = json_decode('{
    "text": "Pick a color:",
    "quick_replies":[
      {
        "content_type":"text",
        "title":"Red",
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/red.png"
      },{
        "content_type":"text",
        "title":"Green",
        "payload":"<POSTBACK_PAYLOAD>",
        "image_url":"http://example.com/img/green.png"
      }
    ]
  }',true);
                break;
            case 'GenericTemplate':
                $result = json_decode('{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"generic",
        "elements":[
           {
            "title":"Welcome!",
            "image_url":"https://petersfancybrownhats.com/company_image.png",
            "subtitle":"We have the right hat for everyone.",
            "default_action": {
              "type": "web_url",
              "url": "https://petersfancybrownhats.com/view?item=103",
              "messenger_extensions": false,
              "webview_height_ratio": "tall",
              "fallback_url": "https://petersfancybrownhats.com/"
            },
            "buttons":[
              {
                "type":"web_url",
                "url":"https://petersfancybrownhats.com",
                "title":"View Website"
              },{
                "type":"postback",
                "title":"Start Chatting",
                "payload":"DEVELOPER_DEFINED_PAYLOAD"
              }              
            ]      
          }
        ]
      }
    }
  }',true);
                break;
            case 'ButtonTemplate':
                $result = json_decode('{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"button",
        "text":"What do you want to do next?",
        "buttons":[
          {
            "type":"web_url",
            "url":"https://www.messenger.com",
            "title":"Visit Messenger"
          }
        ]
      }
    }
  }',true);
                break;
            case 'OpenGraphTemplate':
                $result = json_decode('{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"open_graph",
        "elements":[
           {
            "url":"https://open.spotify.com/track/7GhIk7Il098yCjg4BQjzvb",
            "buttons":[
              {
                "type":"web_url",
                "url":"https://en.wikipedia.org/wiki/Rickrolling",
                "title":"View More"
              }              
            ]      
          }
        ]
      }
    }
  }',true);
                break;
            case 'MediaTemplate':
                $result = json_decode('{
    "attachment": {
      "type": "template",
      "payload": {
         "template_type": "media",
         "elements": [
            {
               "media_type": "<image|video>",
               "url": "<FACEBOOK_URL>"
            }
         ]
      }
    }    
  }',true);

                break;
            case 'ReceiptTemplate':

                $result = json_decode('{
    "attachment":{
      "type":"template",
      "payload":{
        "template_type":"receipt",
        "recipient_name":"Stephane Crozatier",
        "order_number":"12345678902",
        "currency":"USD",
        "payment_method":"Visa 2345",        
        "order_url":"http://petersapparel.parseapp.com/order?order_id=123456",
        "timestamp":"1428444852",         
        "address":{
          "street_1":"1 Hacker Way",
          "city":"Menlo Park",
          "postal_code":"94025",
          "state":"CA",
          "country":"US"
        },
        "summary":{
          "subtotal":75.00,
          "shipping_cost":4.95,
          "total_tax":6.19,
          "total_cost":56.14
        },
        "adjustments":[
          {
            "name":"New Customer Discount",
            "amount":20
          },
          {
            "name":"$10 Off Coupon",
            "amount":10
          }
        ],
        "elements":[
          {
            "title":"Classic White T-Shirt",
            "subtitle":"100% Soft and Luxurious Cotton",
            "quantity":2,
            "price":50,
            "currency":"USD",
            "image_url":"http://petersapparel.parseapp.com/img/whiteshirt.png"
          },
          {
            "title":"Classic Gray T-Shirt",
            "subtitle":"100% Soft and Luxurious Cotton",
            "quantity":1,
            "price":25,
            "currency":"USD",
            "image_url":"http://petersapparel.parseapp.com/img/grayshirt.png"
          }
        ]
      }
    }
  }',true);
                break;
            case 'AirlineBoardingpass':
                $result = json_decode('{
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
  }',true);

                break;
            case 'AirlineCheckin':

                $result = json_decode('{
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
  }',true);

                break;
            case 'AirlineItinerary':

                $result = json_decode('{
    "attachment": {
      "type": "template",
      "payload": {
        "template_type": "airline_itinerary",
        "intro_message": "Here is your flight itinerary.",
        "locale": "en_US",
        "pnr_number": "ABCDEF",
        "passenger_info": [
          {
            "name": "Farbound Smith Jr",
            "ticket_number": "0741234567890",
            "passenger_id": "p001"
          },
          {
            "name": "Nick Jones",
            "ticket_number": "0741234567891",
            "passenger_id": "p002"
          }
        ],
        "flight_info": [
          {
            "connection_id": "c001",
            "segment_id": "s001",
            "flight_number": "KL9123",
            "aircraft_type": "Boeing 737",
            "departure_airport": {
              "airport_code": "SFO",
              "city": "San Francisco"
            },
            "arrival_airport": {
              "airport_code": "SLC",
              "city": "Salt Lake City"
            },
            "flight_schedule": {
              "departure_time": "2016-01-02T19:45",
              "arrival_time": "2016-01-02T21:20"
            },
            "travel_class": "business"
          },
          {
            "connection_id": "c002",
            "segment_id": "s002",
            "flight_number": "KL321",
            "aircraft_type": "Boeing 747-200",
            "travel_class": "business",
            "departure_airport": {
              "airport_code": "SLC",
              "city": "Salt Lake City",
              "terminal": "T1",
              "gate": "G33"
            },
            "arrival_airport": {
              "airport_code": "AMS",
              "city": "Amsterdam",
              "terminal": "T1",
              "gate": "G33"
            },
            "flight_schedule": {
              "departure_time": "2016-01-02T22:45",
              "arrival_time": "2016-01-03T17:20"
            }
          }
        ],
        "passenger_segment_info": [
          {
            "segment_id": "s001",
            "passenger_id": "p001",
            "seat": "12A",
            "seat_type": "Business"
          },
          {
            "segment_id": "s001",
            "passenger_id": "p002",
            "seat": "12B",
            "seat_type": "Business"
          },
          {
            "segment_id": "s002",
            "passenger_id": "p001",
            "seat": "73A",
            "seat_type": "World Business",
            "product_info": [
              {
                "title": "Lounge",
                "value": "Complimentary lounge access"
              },
              {
                "title": "Baggage",
                "value": "1 extra bag 50lbs"
              }
            ]
          },
          {
            "segment_id": "s002",
            "passenger_id": "p002",
            "seat": "73B",
            "seat_type": "World Business",
            "product_info": [
              {
                "title": "Lounge",
                "value": "Complimentary lounge access"
              },
              {
                "title": "Baggage",
                "value": "1 extra bag 50lbs"
              }
            ]
          }
        ],
        "price_info": [
          {
            "title": "Fuel surcharge",
            "amount": "1597",
            "currency": "USD"
          }
        ],
        "base_price": "12206",
        "tax": "200",
        "total_price": "14003",
        "currency": "USD"
      }
    }
  }',true);

                break;
            case 'AirlineUpdate':

                $result = json_decode('{
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
  }',true);

                break;
            case 'Product':

                $result = json_decode('{
    "attachment":{
      "type":"template",
        "payload": {
          "template_type": "product",
          "elements": [
            {
              "id": "<PRODUCT_ID_1>"
            },
            {
              "id": "<PRODUCT_ID_2>"
            }
         ]
      }
    }
  }',true);

                break;
        }

        return $result;

    }
}
