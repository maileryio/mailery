<?php

namespace Mailery\Factory;

use Predis\Client as RedisClient;

class RedisFactory
{
    /**
     * @var array
     */
    private array $parameters;

    /**
     * @var array
     */
    private array $options;

    /**
     * @param array $parameters
     * @param array $options
     */
    public function __construct(array $parameters, array $options)
    {
        $this->parameters = $parameters;
        $this->options = $options;
    }

    /**
     * @return RedisClient
     */
    public function __invoke()
    {
        return new RedisClient($this->parameters, $this->options);
    }
}
