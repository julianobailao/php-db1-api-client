<?php

namespace JulianoBailao\DomusApi\Endpoints;

use JulianoBailao\DomusApi\Core\Endpoint;
use JulianoBailao\DomusApi\Data\ProfitabilityData;

class Profitability extends Endpoint
{
    /**
     * Create a new profitability data.
     *
     * @return ProfitabilityData
     */
    public function create()
    {
        return new ProfitabilityData($this);
    }

    /**
     * Send the profitability Request.
     *
     * @param int $id the product line id.
     *
     * @return stdObject
     */
    public function save()
    {
        return $this->run('POST', 'pedidovenda-rest/lucratividade');
    }
}
