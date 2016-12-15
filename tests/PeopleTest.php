<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class PeopleTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'people_paginate'));

        $this->assertEquals($client->people()->paginate(), FakeHandler::getJson('people_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'people_get'));

        $this->assertEquals($client->people()->get(4), FakeHandler::getJson('people_get'));
    }

    public function testDocment()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'document_get'));

        $this->assertEquals($client->people()->document(99999999999), FakeHandler::getJson('document_get'));
    }

    public function testDocmentValidate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'document_validate'));

        $this->assertEquals($client->people()->validateDocument(99999999999), FakeHandler::getJson('document_validate'));
    }

    public function testDeliveryAddress()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'delivery_address_get'));

        $this->assertEquals($client->people()->deliveryAddresses(4), FakeHandler::getJson('delivery_address_get'));
    }

    public function testDefaultValues()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'default_values_get'));

        $this->assertEquals($client->people()->defaultValues(4), FakeHandler::getJson('default_values_get'));
    }

    public function testCreate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'people_get'));
        $person = $client->people()->create();
        $person->name = 'Donkey Man';

        $this->assertEquals($person->save(), FakeHandler::getJson('people_get'));
    }

    public function testUpdate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'people_get'));
        $person = $client->people()->update(1);
        $person->name = 'Donkey Man - 2';
        $person->address(['zipCode' => '99999999']);
        $person->contacts(['phone' => '99999999']);

        $this->assertEquals($person->save(), FakeHandler::getJson('people_get'));
    }
}
