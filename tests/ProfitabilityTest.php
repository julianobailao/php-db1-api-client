<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Tests\Mock\FakeHandler;

class ProfitabilityTest extends TestCase
{
    public function testCreate()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $client->setHandler(FakeHandler::mockResponses('login', 'branch', 'profitability_get'));
        $product = $client->profitability()->create();
        $product->foo = 'bar';
        $product->filtros(['foo' => 'bar']);
        $product->ordenacoes(['foo' => 'bar']);

        $this->assertEquals($product->save(), FakeHandler::getJson('profitability_get'));
    }
}
