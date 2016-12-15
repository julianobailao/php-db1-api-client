<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class ProductTest extends TestCase
{
    public function testPaginate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'product_paginate'));

        $this->assertEquals($client->products()->paginate(), FakeHandler::getJson('product_paginate'));
    }

    public function testGet()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'product_get'));

        $this->assertEquals($client->products()->get(4), FakeHandler::getJson('product_get'));
    }

    public function testCreate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'product_get'));
        $product = $client->products()->create();
        $product->title = 'Donkey Product';

        $this->assertEquals($product->save(), FakeHandler::getJson('product_get'));
    }

    public function testUpdate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'product_get'));
        $product = $client->products()->update(1);
        $product->title = 'Donkey Product';
        $product->codigoBarras(['code' => '12321313']);
        $product->local(['title' => 'foo']);
        $product->campoAdicionais(['foo' => 'bar']);
        $product->fornecedores(['foo' => 'bar']);

        $this->assertEquals($product->save(), FakeHandler::getJson('product_get'));
    }

    public function testDelete()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'product_get'));

        $this->assertEquals($client->products()->delete(1), FakeHandler::getJson('product_get'));
    }
}
