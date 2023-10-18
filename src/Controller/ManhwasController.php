<?php

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Manhwa;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManhwasController extends AbstractController
{
    #[Route('/manhwas', name: 'manhwas')]
    public function index(EntityManagerInterface $entityManager,PaginatorInterface $paginator, Request $request): Response
    {

        $manhwas = $entityManager->getRepository(Manhwa::class)->findAll();

        $paginationManhwa = $paginator->paginate(
            $manhwas,
            $request->query->getInt('page', 1),  // Page number in the request
            6  // Number of items per page
        );

        return $this->render('manhwas/index.html.twig', [
            'controller_name' => 'ManhwasController',
            'manhwas' => $paginationManhwa,
        ]);
    }

    #[Route('/manhwas/{id}', name: 'manhwas_show')]
    public function show($id, EntityManagerInterface $entityManager): Response
    {
        $manhwa = $entityManager->getRepository(Manhwa::class)->find($id);

        return $this->render('readable_show.html.twig', [
            'readable' => $manhwa,
        ]);
    }
}
