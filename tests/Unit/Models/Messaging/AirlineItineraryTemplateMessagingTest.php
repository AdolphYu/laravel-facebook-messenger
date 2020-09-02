<?php

namespace AdolphYu\FBMessenger\Tests\Models\Messaging;


use AdolphYu\FBMessenger\Models\Message\Payload;
use AdolphYu\FBMessenger\Models\Messaging\AirlineItineraryTemplateMessaging;
use AdolphYu\FBMessenger\Tests\TestCase;


/**
 *
 * Class AirlineItineraryTemplateMessagingTest
 * @package AdolphYu\FBMessenger\Tests\Models\Message
 */
class AirlineItineraryTemplateMessagingTest extends TestCase
{

    /**
     * testToArray
     */
    public function testToArray()
    {
        $payload = json_decode('{
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
      }',true);

        $expected = self::initData();
        $actual = new AirlineItineraryTemplateMessaging('<USER_ID>',[]);
        $actual->setPayload(new Payload($payload));
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineItineraryTemplateMessaging('<USER_ID>',[]);
        $actual->setPayload($payload);
        $this->assertEquals($expected, $actual->toArray());

        $actual = new AirlineItineraryTemplateMessaging('<USER_ID>',$payload);
        $this->assertEquals($expected, $actual->toArray());

    }

    /**
     * initData
     * @return array
     */
    public static function initData(){

        return json_decode('{
  "recipient": {
    "id": "<USER_ID>"
  },
  "message": {
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
  }
}',true);
    }
}
