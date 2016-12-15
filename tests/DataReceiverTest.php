<?php

namespace JulianoBailao\DomusApi\Tests;

use JulianoBailao\DomusApi\Client;
use JulianoBailao\DomusApi\Core\DataReceiver;
use JulianoBailao\DomusApi\Endpoints\Lines;

class DataReceiverTest extends TestCase
{
    public function testGlobal()
    {
        $client = new Client('foo.bar', '8080', 'username', 'password');
        $lines = new Lines($client);
        $data = new DataReceiver($lines);
        $data->fill([
            'foo' => 'bar',
        ]);
        $data->bar = 'foo';

        $this->assertEquals($data->bar, 'foo');
        $this->assertEquals($data->foo, 'bar');
        $this->assertEquals($data->toArray(), [
            'foo' => 'bar',
            'bar' => 'foo',
            'id'  => null,
        ]);
    }
}
