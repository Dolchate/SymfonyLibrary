<?php

namespace App\Controller;

use App\Entity\Novel;
use App\Form\NovelType;
use App\Repository\NovelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/novel')]
class NovelController extends AbstractController
{
    #[Route('/', name: 'app_novel_index', methods: ['GET'])]
    public function index(NovelRepository $novelRepository): Response
    {
        return $this->render('novel/index.html.twig', [
            'novels' => $novelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_novel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $novel = new Novel();
        $form = $this->createForm(NovelType::class, $novel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($novel);
            $entityManager->flush();

            return $this->redirectToRoute('app_novel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('novel/new.html.twig', [
            'novel' => $novel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_novel_show', methods: ['GET'])]
    public function show(Novel $novel): Response
    {
        return $this->render('novel/show.html.twig', [
            'novel' => $novel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_novel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Novel $novel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NovelType::class, $novel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_novel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('novel/edit.html.twig', [
            'novel' => $novel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_novel_delete', methods: ['POST'])]
    public function delete(Request $request, Novel $novel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$novel->getId(), $request->request->get('_token'))) {
            $entityManager->remove($novel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_novel_index', [], Response::HTTP_SEE_OTHER);
    }
}
