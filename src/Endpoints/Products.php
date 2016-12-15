<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\CreationContract;
use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Data\ProductData;

class Products extends Endpoint implements GetContract, CreationContract
{
    /**
     * Get a page of products list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/produtos', $query);
    }

    /**
     * Get a specific product.
     *
     * @param int $id the product id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/produtos/'.$id);
    }

    /**
     * Create a new product.
     *
     * @return ProductData
     */
    public function create()
    {
        return new ProductData($this);
    }

    /**
     * Update a existing product.
     *
     * @return ProductData
     */
    public function update($id)
    {
        return new ProductData($this, $id);
    }

    /**
     * Send the save request.
     *
     * @param PersonData $data
     *
     * @return stdClass
     */
    public function save(ProductData $data)
    {
        $id = $data->getId();

        return $this->run(
            $id == null ? 'POST' : 'PUT',
            'pedidovenda-rest/pessoas'.($id > 0 ? '/'.$id : null),
            ['json' => $data->toArray()]
        );
    }

    /**
     * Delete a product.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->run('DELETE', 'pedidovenda-rest/pessoas/'.$id);
    }
}
