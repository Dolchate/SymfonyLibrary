<?php

namespace App\Controller;

use App\Form\AddFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Readable;

class AddController extends AbstractController
{
    #[Route('/add', name: 'add')]
    public function index(): Response
    {
        $readable = new Readable();
        $form = $this->createForm(AddFormType::class, $readable);

        if ($form->isSubmitted() && $form->isValid()) {
            $readable = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($readable);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('add/index.html.twig', [
            'controller_name' => 'AddController',
        ]);
    }
}
