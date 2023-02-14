<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Service\Attribute\SubscribedService;
use Symfony\Contracts\Service\ServiceSubscriberTrait;

use App\Service;

class Controller extends AbstractController
{
    use ServiceSubscriberTrait;

    #[SubscribedService]
    private function getService(): Service
    {
        return $this->container->get(__METHOD__);
    }

    #[Route('/')]
    public function __invoke(): Response
    {
        $this->getService();
        return new Response();
    }
}
