<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Novel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NovelsController extends AbstractController
{
    #[Route('/novels', name: 'novels')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {

        $novels = $entityManager->getRepository(Novel::class)->findAll();

        $paginator = $paginator->paginate(
            $novels,
            $request->query->getInt('page', 1),  // Page number in the request
            6  // Number of items per page
        );

        return $this->render('novels/index.html.twig', [
            'controller_name' => 'NovelsController',
            'novels' => $paginator,
        ]);
    }

    #[Route('/novels/{id}', name: 'novels_show')]
    public function show($id, EntityManagerInterface $entityManager): Response
    {
        $novel = $entityManager->getRepository(Novel::class)->find($id);

        return $this->render('readable_show.html.twig', [
            'readable' => $novel,
        ]);
    }
}
