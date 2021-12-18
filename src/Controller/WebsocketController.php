<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebsocketController extends AbstractController
{
    /**
     * @var string
     */
    private $websocketHost;

    /**
     * @var int
     */
    private $websocketPort;

    public function __construct(string $websocketHost, int $websocketPort)
    {
        $this->websocketHost = $websocketHost;
        $this->websocketPort = $websocketPort;
    }

    /**
     * @Route("/", name="websocket")
     */
    public function index(): Response
    {
        return $this->render('websocket/index.html.twig', [
            'websocket_host' => $this->websocketHost,
            'websocket_port' => $this->websocketPort,
        ]);
    }
}
