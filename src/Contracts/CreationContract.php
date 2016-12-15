<?php

namespace JulianoBailao\DomusApi\Contracts;

interface CreationContract
{
    /**
     * Crate a new record.
     *
     * @param array $data
     *
     * @return stdObject
     */
    public function create();

    /**
     * Update a existing record.
     *
     * @param int $id
     * @param array $data
     *
     * @return stdObject
     */
    public function update($id);
}
