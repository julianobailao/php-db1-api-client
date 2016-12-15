<?php

namespace JulianoBailao\DomusApi\Tests\Mock;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response as Psr7Response;

class FakeHandler
{
    public static function mockResponses($keys)
    {
        $responses = [];
        $keys = is_array($keys) ? $keys : func_get_args();

        foreach ($keys as $key) {
            $responses[] = new Psr7Response(200, [], file_get_contents(__DIR__.'/responses/'.$key.'.json'));
        }

        return HandlerStack::create(new MockHandler($responses));
    }

    public static function getJson($key)
    {
        return json_decode(file_get_contents(__DIR__.'/responses/'.$key.'.json'));
    }
}
