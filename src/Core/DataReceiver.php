<?php

namespace JulianoBailao\DomusApi\Core;

class DataReceiver
{
    /**
     * The id from update requests.
     *
     * @var int
     */
    protected $id;

    /**
     * The Endpoint object.
     *
     * @var Endpoint
     */
    protected $endpoint;

    /**
     * The request data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create a new DataReceiver instance.
     *
     * @param string $method
     * @param string $uri
     * @param int    $id
     */
    public function __construct(Endpoint $endpoint, $id = null)
    {
        $this->id = $id;
        $this->endpoint = $endpoint;
        $this->data = new \stdClass();
    }

    /**
     * Fill all the request data.
     *
     * @param array $data
     *
     * @return self
     */
    public function fill(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the request data.
     *
     * @return array
     */
    public function toArray()
    {
        $this->data->id = $this->id;

        return json_decode(json_encode($this->data), true);
    }

    /**
     * Run the save request.
     *
     * @return stdClass
     */
    public function save()
    {
        return $this->endpoint->save($this);
    }

    /**
     * Get the request id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set a specific data point.
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value = null)
    {
        $this->data->{$name} = $value;
    }

    /**
     * Get a specific data point.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data->{$name};
    }

    /**
     * Set a attribute with array values.
     *
     * @param string $method
     * @param array  $args
     *
     * @return stdClass
     */
    public function __call($method, $args)
    {
        return $this->data->{$method} = (object) $args[0];
    }
}
