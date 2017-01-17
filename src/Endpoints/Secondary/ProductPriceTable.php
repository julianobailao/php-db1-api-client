<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;

class ProductPriceTable extends Endpoint implements GetContract
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
        return $this->page('pedidovenda-rest/produtos', $query);
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
        return $this->run('GET', 'pedidovenda-rest/produtos/'.$id);
    }
}
