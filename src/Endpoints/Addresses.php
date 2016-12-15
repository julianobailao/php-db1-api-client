<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Endpoints\Secondary\Cities;

class Addresses extends Endpoint
{
    /**
     * Get a page of addresses list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/enderecos', $query);
    }

    /**
     * Get a page of states list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function states(array $query = [])
    {
        return $this->page('operacional/enderecos/ufs', $query);
    }

    /**
     * Get a page of types list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function types(array $query = [])
    {
        return $this->page('operacional/enderecos/tipos', $query);
    }

    /**
     * Get a cities endpoint.
     *
     * @return Cities
     */
    public function cities()
    {
        return new Cities($this->client);
    }
}
