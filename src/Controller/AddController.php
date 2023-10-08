<?php

namespace App\Controller;

use App\Entity\Manga;
use App\Entity\Manhwa;
use App\Entity\Novel;
use App\Form\AddFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Readable;

class AddController extends AbstractController
{
    #[Route('/add', name: 'add')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $readable = new Readable();
        $form = $this->createForm(AddFormType::class, $readable);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('type')->getData() == 'novel') {
                $novel = new Novel();
                $novel->setTitle($form->get('title')->getData());
                $novel->setDescription($form->get('description')->getData());
                $novel->setAuthor($form->get('author')->getData());
                $novel->setDayOfWeek($form->get('daysOfWeek')->getData());
                $entityManager->persist($novel);
            } elseif ($form->get('type')->getData() == 'manhwa'){
                $manhwa = new Manhwa();
                $manhwa->setTitle($form->get('title')->getData());
                $manhwa->setDescription($form->get('description')->getData());
                $manhwa->setAuthor($form->get('author')->getData());
                $manhwa->setDayOfWeek($form->get('daysOfWeek')->getData());
                $entityManager->persist($manhwa);
            } elseif ($form->get('type')->getData() == 'manga'){
                $manga = new Manga();
                $manga->setTitle($form->get('title')->getData());
                $manga->setDescription($form->get('description')->getData());
                $manga->setAuthor($form->get('author')->getData());
                $manga->setDayOfWeek($form->get('daysOfWeek')->getData());
                $entityManager->persist($manga);
            }
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('add/index.html.twig', [
            'addForm' => $form->createView(),
        ]);
    }
}
