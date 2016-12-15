<?php

namespace JulianoBailao\DomusApi\Endpoints\Secondary;

use JulianoBailao\DomusApi\Contracts\GetContract;
use JulianoBailao\DomusApi\Core\Endpoint;

class Subcategories extends Endpoint implements GetContract
{
    /**
     * The category id.
     *
     * @var int
     */
    protected $categoryId;

    /**
     * Create a new Subcategories instance.
     *
     * @param int $categoryId
     */
    public function __construct($client, $categoryId)
    {
        parent::__construct($client);
        $this->categoryId = $categoryId;
    }

    /**
     * Get a page of subcategories list.
     *
     * @param array $query the request query string.
     *
     * @return stdObject
     */
    public function paginate(array $query = [])
    {
        return $this->page('operacional/categorias/'.$this->categoryId.'/subcategorias', $query);
    }

    /**
     * Get a specific subcategory.
     *
     * @param int $id the subcategory id.
     *
     * @return stdObject
     */
    public function get($id)
    {
        return $this->run('GET', 'operacional/categorias/'.$this->categoryId.'/subcategorias/'.$id);
    }
}
