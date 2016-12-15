<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Endpoints\Secondary\Models;

class Brands extends Endpoint implements GetContract
{
    /**
     * Get a page of brands list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/marcas', $query);
    }

    /**
     * Get a specific brand.
     *
     * @param int $id the brand id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/marcas/'.$id);
    }

    /**
     * Get the Models endpoint from a brand.
     *
     * @param int $brandId
     *
     * @return Models
     */
    public function models($brandId)
    {
        return new Models($this->client, $brandId);
    }
}
