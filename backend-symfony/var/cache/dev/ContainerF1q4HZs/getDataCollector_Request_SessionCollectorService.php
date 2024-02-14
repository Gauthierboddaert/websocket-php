<?php

namespace ContainerF1q4HZs;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataCollector_Request_SessionCollectorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'data_collector.request.session_collector' shared service.
     *
     * @return \Closure
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['data_collector.request.session_collector'] = ($container->privates['data_collector.request'] ?? self::getDataCollector_RequestService($container))->collectSessionUsage(...);
    }
}
