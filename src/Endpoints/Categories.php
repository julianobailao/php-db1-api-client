<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Endpoints\Secondary\Subcategories;

class Categories extends Endpoint implements GetContract
{
    /**
     * Get a page of categories list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/categorias', $query);
    }

    /**
     * Get a specific category.
     *
     * @param int $id the category id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/categorias/'.$id);
    }

    /**
     * Get the Subcategories endpoint from a category.
     *
     * @param int $brandId
     *
     * @return Subcategories
     */
    public function subcategories($brandId)
    {
        return new Subcategories($this->client, $brandId);
    }
}
