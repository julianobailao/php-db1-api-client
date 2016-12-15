<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class AddressTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'address_paginate'));

        $this->assertEquals($client->addresses()->paginate(), FakeHandler::getJson('address_paginate'));
    }

    public function testTypes()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'address_type_paginate'));

        $this->assertEquals($client->addresses()->types(), FakeHandler::getJson('address_type_paginate'));
    }

    public function testStates()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'state_paginate'));

        $this->assertEquals($client->addresses()->states(), FakeHandler::getJson('state_paginate'));
    }

    public function testCities()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'city_paginate'));

        $this->assertEquals($client->addresses()->cities()->paginate(), FakeHandler::getJson('city_paginate'));
    }

    public function testCitiesGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'city_get'));

        $this->assertEquals($client->addresses()->cities()->get(1), FakeHandler::getJson('city_get'));
    }

    public function testCitiesNeighborhoods()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'neighborhood_paginate'));

        $this->assertEquals($client->addresses()->cities()->neighborhoods(1)->paginate(), FakeHandler::getJson('neighborhood_paginate'));
    }

    public function testCitiesNeighborhoodsGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'neighborhood_get'));

        $this->assertEquals($client->addresses()->cities()->neighborhoods(1)->get(1), FakeHandler::getJson('neighborhood_get'));
    }

    public function testCitiesNeighborhoodsCreate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'neighborhood_get'));
        $neighborhood = $client->addresses()->cities()->neighborhoods(1)->create();
        $neighborhood->foo = 'bar';

        $this->assertEquals($neighborhood->save(), FakeHandler::getJson('neighborhood_get'));
    }

    public function testCitiesNeighborhoodsStreets()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'street_paginate'));

        $this->assertEquals($client->addresses()->cities()->neighborhoods(1)->streets(1)->paginate(), FakeHandler::getJson('street_paginate'));
    }

    public function testCitiesNeighborhoodsStreetsGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'street_get'));

        $this->assertEquals($client->addresses()->cities()->neighborhoods(1)->streets(1)->get(1), FakeHandler::getJson('street_get'));
    }

    public function testCitiesStreetCreate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'street_get'));
        $street = $client->addresses()->cities()->neighborhoods(1)->streets(1)->create();
        $street->foo = 'bar';

        $this->assertEquals($street->save(), FakeHandler::getJson('street_get'));
    }
}
