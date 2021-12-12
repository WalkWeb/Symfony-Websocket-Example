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
    private $websocketUrl;

    /**
     * @var int
     */
    private $websocketPort;

    public function __construct(string $websocketUrl, int $websocketPort)
    {
        $this->websocketUrl = $websocketUrl;
        $this->websocketPort = $websocketPort;
    }

    /**
     * @Route("/", name="websocket")
     */
    public function index(): Response
    {
        return $this->render('websocket/index.html.twig', [
            'websocket_url'  => $this->websocketUrl,
            'websocket_port' => $this->websocketPort,
        ]);
    }
}
