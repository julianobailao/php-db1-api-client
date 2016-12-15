<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\DataReceiver;
use JulianoBailao\DomusApi\Core\Endpoint;

class Streets extends Endpoint implements GetContract
{
    /**
     * The city id.
     *
     * @var int
     */
    protected $cityId;

    /**
     * The neighborhood id.
     *
     * @var int
     */
    protected $neighborhoodId;

    /**
     * Create a new Models instance.
     *
     * @param int $neighborhoodId
     */
    public function __construct($client, $cityId, $neighborhoodId)
    {
        parent::__construct($client);
        $this->cityId = $cityId;
        $this->neighborhoodId = $neighborhoodId;
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
        return $this->list('operacional/enderecos/localidade/'.$this->cityId.'/bairros/'.$this->neighborhoodId.'/logradouro', $query);
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
        return $this->run('GET', 'operacional/enderecos/localidade/'.$this->cityId.'/bairros/'.$this->neighborhoodId.'/logradouro/'.$id);
    }

    /**
     * Create a new neighborhood.
     *
     * @return DataReceiver
     */
    public function create()
    {
        return new DataReceiver($this);
    }

    /**
     * Send the save request.
     *
     * @param DataReceiver $data
     *
     * @return stdClass
     */
    public function save(DataReceiver $data)
    {
        return $this->run('POST', 'operacional/enderecos/localidade/'.$this->cityId.'/bairros/'.$this->neighborhoodId.'/logradouro', ['json' => $data->toArray()]);
    }
}
