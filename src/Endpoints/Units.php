<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Endpoints\Secondary\Subcategories;

class Units extends Endpoint implements GetContract
{
    /**
     * Get a page of product lines list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->list('operacional/unidades', $query);
    }

    /**
     * Get a specific product line.
     *
     * @param int $id the product line id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/unidades/'.$id);
    }
}
