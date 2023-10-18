<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Manga;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MangasController extends AbstractController
{
    #[Route('/mangas', name: 'mangas')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {

        $mangas = $entityManager->getRepository(Manga::class)->findAll();



        $paginationManga = $paginator->paginate(
            $mangas,
            $request->query->getInt('page', 1),  // Page number in the request
            7  // Number of items per page
        );

        return $this->render('mangas/index.html.twig', [
            'controller_name' => 'MangasController',
            'mangas' => $paginationManga,
        ]);
    }

    #[Route('/mangas/{id}', name: 'mangas_show')]
    public function show($id, EntityManagerInterface $entityManager): Response
    {
        $manga = $entityManager->getRepository(Manga::class)->find($id);

        return $this->render('readable_show.html.twig', [
            'readable' => $manga,
        ]);
    }
}
