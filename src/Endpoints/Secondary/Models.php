<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;

class Models extends Endpoint implements GetContract
{
    /**
     * The brand id.
     *
     * @var int
     */
    protected $brandId;

    /**
     * Create a new Models instance.
     *
     * @param int $brandId
     */
    public function __construct($client, $brandId)
    {
        parent::__construct($client);
        $this->brandId = $brandId;
    }

    /**
     * Get a page of models list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/marcas/'.$this->brandId.'/modelos', $query);
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
        return $this->run('GET', 'operacional/marcas/'.$this->brandId.'/modelos/'.$id);
    }
}
