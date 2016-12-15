<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class BrandTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'brand_paginate'));

        $this->assertEquals($client->brands()->paginate(), FakeHandler::getJson('brand_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'brand_get'));

        $this->assertEquals($client->brands()->get(4), FakeHandler::getJson('brand_get'));
    }

    public function testModelPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'model_paginate'));

        $this->assertEquals($client->brands()->models(4)->paginate(), FakeHandler::getJson('model_paginate'));
    }

    public function testModelGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'model_get'));

        $this->assertEquals($client->brands()->models(4)->get(1), FakeHandler::getJson('model_get'));
    }
}
