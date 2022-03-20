<?php

namespace Mailery\Factory;

use Predis\Client as RedisClient;

class RedisFactory
{
    /**
     * @param array $parameters
     * @param array $options
     */
    public function __construct(
        private array $parameters,
        private array $options
    ) {}

    /**
     * @return RedisClient
     */
    public function __invoke()
    {
        return new RedisClient($this->parameters, $this->options);
    }
}
