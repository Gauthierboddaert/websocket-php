<?php

namespace App\Command;

use App\Service\ChatService;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:listener:websocket', description: 'Starts the WebSocket server for the chat application.')]
class WebSocketLauncherCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new ChatService()
                )
            ),
            8081
        );

        $server->run();

        return Command::SUCCESS;
    }

}