<?php
declare(strict_types=1);

namespace Mailery;

final class Timer
{

    /**
     * @var array
     */
    private array $timers = [];

    /**
     * @param string $name
     * @return void
     */
    public function start(string $name): void
    {
        $this->timers[$name] = microtime(true);
    }

    /**
     * @param string $name
     * @return float
     * @throws \InvalidArgumentException
     */
    public function get(string $name): float
    {
        if (!array_key_exists($name, $this->timers)) {
            throw new \InvalidArgumentException("There is no \"$name\" timer started");
        }

        return microtime(true) - $this->timers[$name];
    }

}
