<?php

namespace Mailery\Event;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Psr\EventDispatcher\EventDispatcherInterface as PsrEventDispatcherInterface;

final class SymfonyDispatcher implements EventDispatcherInterface
{

    /**
     * @param PsrEventDispatcherInterface $dispatcher
     */
    public function __construct(
        private PsrEventDispatcherInterface $dispatcher
    ) {}

    /**
     * {@inheritdoc}
     */
    public function dispatch(object $event, string $eventName = null): object
    {
        return $this->dispatcher->dispatch($event);
    }

    /**
     * {@inheritdoc}
     */
    public function getListeners(string $eventName = null)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function getListenerPriority(string $eventName, $listener)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function hasListeners(string $eventName = null)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function addListener($eventName, $listener, int $priority = 0)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeListener(string $eventName, callable $listener)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Not implemented.');
    }

}