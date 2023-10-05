<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NovelsController extends AbstractController
{
    #[Route('/novels', name: 'novels')]
    public function index(): Response
    {
        return $this->render('novels/index.html.twig', [
            'controller_name' => 'NovelsController',
        ]);
    }
}
