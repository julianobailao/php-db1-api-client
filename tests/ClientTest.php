<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Exception\InvalidApiEndPointException;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class ClientTest extends TestCase
{
    public function testMakeUrl()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');

        $this->assertEquals($client->makeUrl('donkey'), 'foo.bar:8080/donkey');
    }

    public function testGetToken()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login'));

        $this->assertEquals($client->getToken(), FakeHandler::getJson('login')->token);
    }

    public function testSetBranch()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch'));
        $client->setBranch(1);

        $this->assertEquals($client->getBranchId(), FakeHandler::getJson('branch')->id);
    }

    public function testCall()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'brand_paginate'));

        $this->assertEquals($client->brands()->paginate(), FakeHandler::getJson('brand_paginate'));
    }
}
