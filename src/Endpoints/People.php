<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Contracts\CreationContract;
use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Data\PersonData;

class People extends Endpoint implements GetContract, CreationContract
{
    /**
     * Get a page of people list.
     *
     * @param array $query the request query string.
     *
     * @return stdClass
     */
    public function paginate(array $query = [])
    {
        return $this->list('operacional/pessoas', $query);
    }

    /**
     * Get a specific person.
     *
     * @param int $id the person id.
     *
     * @return stdClass
     */
    public function get($id)
    {
        return $this->run('GET', 'pedidovenda-rest/pessoas/'.$id);
    }

    /**
     * Check if the document already exists.
     *
     * @param string $documentNumber
     *
     * @return stdClass
     */
    public function document($documentNumber)
    {
        return $this->run('GET', 'pedidovenda-rest/pessoas/documento', ['query' => ['num' => $documentNumber]]);
    }

    /**
     * Validate the document.
     *
     * @param string $documentNumber
     *
     * @return stdClass
     */
    public function validateDocument($documentNumber)
    {
        return $this->run('GET', 'pedidovenda-rest/pessoas/validarDocumento', ['query' => ['num' => $documentNumber]]);
    }

    /**
     * Get the delivery address from a person.
     *
     * @param int $id
     *
     * @return stdClass
     */
    public function deliveryAddresses($id)
    {
        return $this->run('GET', 'pedidovenda-rest/pessoas/'.$id.'/enderecosentrega');
    }

    /**
     * Get the default values from a person.
     *
     * @param int $id
     *
     * @return stdClass
     */
    public function defaultValues($id)
    {
        return $this->run('GET', 'pedidovenda-rest/pessoas/'.$id.'/valoresPadraoPedido');
    }

    /**
     * Create a new person.
     *
     * @return PersonData
     */
    public function create()
    {
        return new PersonData($this);
    }

    /**
     * Update a existing person.
     *
     * @param int $id
     *
     * @return stdClass
     */
    public function update($id)
    {
        return new PersonData($this, $id);
    }

    /**
     * Send the save request.
     *
     * @param PersonData $data
     *
     * @return stdClass
     */
    public function save(PersonData $data)
    {
        $id = $data->getId();

        return $this->run(
            $id == null ? 'POST' : 'PUT',
            'pedidovenda-rest/pessoas'.($id > 0 ? '/'.$id : null),
            ['json' => $data->toArray()]
        );
    }
}
