<?php

namespace App\Controller\Main;

use App\Controller\Main\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomesController extends BaseController
{
    //#[Route('/', name: 'homes')]
    /**
     * @Route("/", name = "homes", methods={"GET","HEAD"})
     */
    public function index(): Response
    {
        $forRender = parent::renderDefault();
        return $this->render('main/index.html.twig', $forRender);
    }
}
