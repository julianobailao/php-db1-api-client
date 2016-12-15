<?php

namespace JulianoBailao\DomusApi;

use JulianoBailao\DomusApi\Core\Request;
use JulianoBailao\DomusApi\Exception\InvalidApiEndPointException;
use JulianoBailao\DomusApi\Exception\InvalidHostException;

class Client
{
    /**
     * The api host.
     *
     * @var string
     */
    protected $host;

    /**
     * The api port.
     *
     * @var string
     */
    protected $port;

    /**
     * Api usernamename / email.
     *
     * @var string
     */
    protected $username;

    /**
     * Api username password.
     *
     * @var string
     */
    protected $password;

    /**
     * Api authentication token.
     *
     * @var string
     */
    protected $token;

    /**
     * Domus branch id to login.
     *
     * @var int
     */
    protected $branchId;

    /**
     * The api client handler.
     *
     * @var mixed
     */
    protected $handler;

    /**
     * Create a new api client instance.
     *
     * @param string $host
     * @param string $port
     * @param string $username
     * @param string $password
     *
     * @throws InvalidHostException
     */
    public function __construct($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get the api uthetication token.
     *
     * @return string
     */
    public function getToken()
    {
        if ($this->token == null) {
            $this->auth();
        }

        return $this->token;
    }

    /**
     * Api authentication.
     *
     * @return self
     */
    protected function auth()
    {
        $request = new Request($this->handler);
        $this->token = $request->run('POST', $this->makeUrl('pedidovenda-rest/auth'), ['json' => [
            'login'    => $this->username,
            'password' => $this->password,
        ]])->token;

        return $this;
    }

    /**
     * Set the branch of endpoint operation.
     *
     * @param int $branchId
     *
     * @return self
     */
    public function setBranch($branchId)
    {
        $request = new Request($this->handler);
        $this->branchId = $request->run('PUT', $this->makeUrl('pedidovenda-rest/auth'), [
            'json' => [
                'id' => $branchId,
            ],
            'headers' => [
                'X-Session-ID' => $this->getToken(),
            ],
        ])->id;

        return $this;
    }

    /**
     * Make the endpoint full url.
     *
     * @param string $endpoint
     *
     * @return string
     */
    public function makeUrl($endpoint)
    {
        $host = rtrim(str_replace(['http://', 'https://'], null, $this->host), '/');
        $endpoint = ltrim($endpoint, '/');

        return $host.':'.$this->port.'/'.$endpoint;
    }

    /**
     * Sets the client handler.
     *
     * @param mixed $handler
     */
    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    /**
     * Gets the client handler.
     *
     * @param mixed $handler
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Get the branch id.
     *
     * @return int
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Call a dinamyc api endpoint.
     *
     * @param string $method
     * @param array  $args
     *
     * @throws InvalidApiEndPointException
     *
     * @return mixed
     */
    public function __call($method, array $args)
    {
        $class = 'JulianoBailao\DomusApi\Endpoints\\'.ucfirst(strtolower($method));

        if (!class_exists($class)) {
            throw new InvalidApiEndPointException("The domus api $method endpoint don't exists.", 1);
        }

        array_unshift($args, $this);

        return call_user_func_array([new \ReflectionClass($class), 'newInstance'], $args);
    }
}
