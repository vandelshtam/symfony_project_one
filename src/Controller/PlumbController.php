<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlumbController extends AbstractController
{
    //#[Route('/plumb', name: 'plumb')]
    /**
     * @Route("/plumb", name="plumb")
     */
    public function index(): Response
    {
        return $this->render('plumb/index.html.twig', [
            'title' => 'Home PlumbInstall',
        ]);
    }
}
