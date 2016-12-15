<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;

class Cities extends Endpoint implements GetContract
{
    /**
     * Get a page of models list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->list('operacional/enderecos/localidade', $query);
    }

    /**
     * Get a specific model.
     *
     * @param int $id the model id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/enderecos/localidade/'.$id);
    }

    /**
     * Get te Neighborhoods endpoint.
     *
     * @param int $cityId
     *
     * @return Neighborhoods
     */
    public function neighborhoods($cityId)
    {
        return new Neighborhoods($this->client, $cityId);
    }
}
