<?php

namespace JulianoBailao\DomusApi\Data;

use JulianoBailao\DomusApi\Core\DataReceiver;

class ProfitabilityData extends DataReceiver
{
    /**
     * Put a filter on profitability data.
     *
     * @param array $filters
     *
     * @return stdClass
     */
    public function filtros(array $filters)
    {
        if (!isset($this->data->Filtros)) {
            $this->data->Filtros = [];
        }

        return $this->data->Filtros[] = (object) $filters;
    }

    /**
     * Put a ordernation on profitability data.
     *
     * @param array $orders
     *
     * @return stdClass
     */
    public function ordenacoes(array $orders)
    {
        if (!isset($this->data->Ordenacoes)) {
            $this->data->Ordenacoes = [];
        }

        return $this->data->Ordenacoes[] = (object) $orders;
    }
}
