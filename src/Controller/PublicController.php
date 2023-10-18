<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Entity\Manhwa;
use App\Entity\Novel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{

    public function getLatest(array $array): array
    {
        // Reverse the array
        $array = array_reverse($array);

        // Put limit to 3 elements
        $latest = [];
        $limit = 3;

        for ($i = 0; $i < $limit; $i++) {
            // Check if the index exists
            if (isset($array[$i])) {
                // Add the element to the array
                $latest[] = $array[$i];
            }
        }

        return $latest;
    }

    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $novels = $entityManager->getRepository(Novel::class)->findAll();
        $mangas = $entityManager->getRepository(Manga::class)->findAll();
        $manhwas = $entityManager->getRepository(Manhwa::class)->findAll();

        $novels = $this->getLatest($novels);
        $mangas = $this->getLatest($mangas);
        $manhwas = $this->getLatest($manhwas);

        return $this->render('public/index.html.twig',[
            'novels' => $novels,
            'mangas' => $mangas,
            'manhwas' => $manhwas,
        ]);
    }
}
