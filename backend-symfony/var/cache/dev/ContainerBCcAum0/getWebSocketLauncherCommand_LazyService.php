<?php

namespace ContainerBCcAum0;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWebSocketLauncherCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\WebSocketLauncherCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\WebSocketLauncherCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:listener:websocket', [], 'Starts the WebSocket server for the chat application.', false, #[\Closure(name: 'App\\Command\\WebSocketLauncherCommand')] fn (): \App\Command\WebSocketLauncherCommand => ($container->privates['App\\Command\\WebSocketLauncherCommand'] ?? $container->load('getWebSocketLauncherCommandService')));
    }
}