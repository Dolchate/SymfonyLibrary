<?php

namespace App\Controller;

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



            $entityManager->persist($readable);
            $entityManager->flush();

            return $this->redirectToRoute('add');
        }

        return $this->render('add/index.html.twig', [
            'controller_name' => 'AddController',
        ]);
    }
}
