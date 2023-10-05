<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManhwasController extends AbstractController
{
    #[Route('/manhwas', name: 'manhwas')]
    public function index(): Response
    {
        return $this->render('manhwas/index.html.twig', [
            'controller_name' => 'ManhwasController',
        ]);
    }
}
