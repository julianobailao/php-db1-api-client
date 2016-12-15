<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;

class Lines extends Endpoint implements GetContract
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
        return $this->list('operacional/linhasproduto', $query);
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
        return $this->run('GET', 'operacional/linhasproduto/'.$id);
    }
}
