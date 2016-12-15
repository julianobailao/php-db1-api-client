<?php

namespace JulianoBailao\DomusApi\Core;

use GuzzleHttp\Client;

class Request
{
    /**
     * The client ai handle.
     *
     * @var mixed
     */
    protected $handler;

    /**
     * Create new Request instance.
     *
     * @param mixed $handler
     */
    public function __construct($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Run the request.
     *
     * @param string $method
     * @param string $url
     * @param array  $data
     *
     * @return string
     */
    public function run($method, $url, array $data = [])
    {
        $client = new Client(['handler' => $this->handler]);

        return json_decode($client->request($method, $url, array_merge($data, [
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
            'uSER-aGENT'   => 'JulianoBailao/DomusApi',
            'debug'        => true,
        ]))->getBody());
    }
}
