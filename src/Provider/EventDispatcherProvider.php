<?php
declare(strict_types=1);

namespace Mailery\Provider;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Yiisoft\Di\Container;
use Yiisoft\Di\Support\ServiceProvider;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\EventDispatcher\Provider\Provider;

final class EventDispatcherProvider extends ServiceProvider
{

    /**
     * @param Container $container
     * @return void
     */
    public function register(Container $container): void
    {
        $container->set(ListenerProviderInterface::class, Provider::class);
        $container->set(EventDispatcherInterface::class, Dispatcher::class);
    }

}
