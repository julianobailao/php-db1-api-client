<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class UnitTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'unit_paginate'));

        $this->assertEquals($client->units()->paginate(), FakeHandler::getJson('unit_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'unit_get'));

        $this->assertEquals($client->units()->get(4), FakeHandler::getJson('unit_get'));
    }
}
