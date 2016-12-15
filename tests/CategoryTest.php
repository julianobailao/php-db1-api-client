<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class CategoryTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'category_paginate'));

        $this->assertEquals($client->categories()->paginate(), FakeHandler::getJson('category_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'category_get'));

        $this->assertEquals($client->categories()->get(4), FakeHandler::getJson('category_get'));
    }

    public function testSubcategoryPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'subcategory_paginate'));

        $this->assertEquals($client->categories()->subcategories(4)->paginate(), FakeHandler::getJson('subcategory_paginate'));
    }

    public function testSubcategoryGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'subcategory_get'));

        $this->assertEquals($client->categories()->subcategories(4)->get(1), FakeHandler::getJson('subcategory_get'));
    }
}
