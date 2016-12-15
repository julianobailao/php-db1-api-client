<?php

namespace JulianoBailao\DomusApi\Core;

use JulianoBailao\DomusApi\Client;

abstract class Endpoint
{
    /**
     * The Client object.
     *
     * @var Client
     */
    protected $client;

    /**
     * The client branch id.
     *
     * @var int
     */
    protected $branchId;

    /**
     * Create a new Endpoint instance.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Set the client branch id.
     *
     * @param int $branchId
     *
     * @return self
     */
    public function setBranch($branchId)
    {
        $this->branchId = $branchId;
        $this->client->setBranch($branchId);

        return $this;
    }

    /**
     * Execute a page request.
     *
     * @param string $point
     * @param array  $query
     *
     * @return stdClass
     */
    protected function page($point, array $query = [])
    {
        $query['pageSize'] = isset($query['pageSize']) ? $query['pageSize'] : 100;
        $query['start'] = isset($query['start']) ? $query['start'] : 0;

        return $this->run('GET', $point, ['query' => $query]);
    }

    /**
     * Run the endpoint operation.
     *
     * @return stdObject
     */
    protected function run($method, $endpoint, array $data = [])
    {
        if (!$this->branchId) {
            $this->setBranch(1);
        }

        $request = new Request($this->client->getHandler());

        return $request->run($method, $this->client->makeUrl($endpoint), array_merge($data, [
            'headers' => [
                'X-Session-ID' => $this->client->getToken(),
            ],
        ]));
    }
}
