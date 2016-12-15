<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class PackageTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'package_paginate'));

        $this->assertEquals($client->packages()->paginate(), FakeHandler::getJson('package_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'package_get'));

        $this->assertEquals($client->packages()->get(4), FakeHandler::getJson('package_get'));
    }
}
