<?php

namespace JulianoBailao\DomusApi\Contracts;

interface GetContract
{
    /**
     * Get all records.
     *
     * @param array $query
     *
     * @return stdObject
     */
    public function paginate(array $query = []);

    /**
     * Get a specific item.
     *
     * @param int $id
     *
     * @return stdObject
     */
    public function get($id);
}
