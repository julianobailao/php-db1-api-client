<?php

namespace JulianoBailao\DomusApi\Data;

use JulianoBailao\DomusApi\Core\DataReceiver;

class ProductData extends DataReceiver
{
    /**
     * Put a bar code on product data.
     *
     * @param array $product
     *
     * @return stdClass
     */
    public function codigoBarras(array $product)
    {
        if (!isset($this->data->codigoBarras)) {
            $this->data->codigoBarras = [];
        }

        return $this->data->codigoBarras[] = (object) $product;
    }

    /**
     * Put a local on product data.
     *
     * @param array $local
     *
     * @return stdClass
     */
    public function local(array $local)
    {
        if (!isset($this->data->local)) {
            $this->data->local = [];
        }

        return $this->data->local[] = (object) $local;
    }

    /**
     * Put a aditional field on product data.
     *
     * @param array $field
     *
     * @return stdClass
     */
    public function campoAdicionais(array $field)
    {
        if (!isset($this->data->campoAdicionais)) {
            $this->data->campoAdicionais = [];
        }

        return $this->data->campoAdicionais[] = (object) $field;
    }

    /**
     * Put a provider field on product data.
     *
     * @param array $provider
     *
     * @return stdClass
     */
    public function fornecedores(array $provider)
    {
        if (!isset($this->data->fornecedores)) {
            $this->data->fornecedores = [];
        }

        return $this->data->fornecedores[] = (object) $provider;
    }
}
