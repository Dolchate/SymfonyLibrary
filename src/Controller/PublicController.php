<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Entity\Manhwa;
use App\Entity\Novel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $novels = $entityManager->getRepository(Novel::class)->findAll();
        $mangas = $entityManager->getRepository(Manga::class)->findAll();
        $manhwas = $entityManager->getRepository(Manhwa::class)->findAll();

        return $this->render('public/index.html.twig',[
            'novels' => $novels,
            'mangas' => $mangas,
            'manhwas' => $manhwas,
        ]);
    }
}
