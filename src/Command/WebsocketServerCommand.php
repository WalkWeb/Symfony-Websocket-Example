<?php

declare(strict_types=1);

namespace App\Command;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\Websocket\MessageHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WebsocketServerCommand extends Command
{
    private const RUN_MESSAGE = 'Starting server on port ';
    protected static $defaultName = 'run:websocket-server';

    /**
     * @var int
     */
    private $websocketPort;

    public function __construct(int $websocketPort)
    {
        parent::__construct();
        $this->websocketPort = $websocketPort;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln(self::RUN_MESSAGE . $this->websocketPort);

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new MessageHandler()
                )
            ),
            $this->websocketPort
        );

        $server->run();

        return 0;
    }
}
