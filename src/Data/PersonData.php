<?php

namespace JulianoBailao\DomusApi\Data;

use JulianoBailao\DomusApi\Core\DataReceiver;

class PersonData extends DataReceiver
{
    /**
     * Put a address on person data.
     *
     * @param array $address
     *
     * @return stdClass
     */
    public function address(array $address)
    {
        if (!isset($this->data->addresses)) {
            $this->data->addresses = [];
        }

        return $this->data->addresses[] = (object) $address;
    }

    /**
     * Put a contact on person data.
     *
     * @param array $contact
     *
     * @return stdClass
     */
    public function contacts(array $contact)
    {
        if (!isset($this->data->contacts)) {
            $this->data->contacts = [];
        }

        return $this->data->contacts[] = (object) $contact;
    }
}
