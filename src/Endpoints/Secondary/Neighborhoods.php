<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\DataReceiver;
use JulianoBailao\DomusApi\Core\Endpoint;

class Neighborhoods extends Endpoint implements GetContract
{
    /**
     * The city id.
     *
     * @var int
     */
    protected $cityId;

    /**
     * Create a new Models instance.
     *
     * @param int $cityId
     */
    public function __construct($client, $cityId)
    {
        parent::__construct($client);
        $this->cityId = $cityId;
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
        return $this->list('operacional/enderecos/localidade/'.$this->cityId.'/bairros', $query);
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
        return $this->run('GET', 'operacional/enderecos/localidade/'.$this->cityId.'/bairros/'.$id);
    }

    /**
     * Get te Streets endpoint.
     *
     * @param int $neighborhoodId
     *
     * @return Streets
     */
    public function streets($neighborhoodId)
    {
        return new Streets($this->client, $this->cityId, $neighborhoodId);
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
        return $this->run(
            'POST',
            'operacional/enderecos/localidade/'.$this->cityId.'/bairros',
            ['json' => $data->toArray()]
        );
    }
}
