<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HealthcheckController
 *
 * @package App\Controller
 */
#[Route(path: '/healthcheck')]
final class HealthcheckController extends AbstractController
{
    #[Route(path: '/ping', name: 'ping', methods: ['GET'])]
    public function pingAction(): Response
    {
        return new JsonResponse('pong');
    }
}
