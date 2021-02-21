<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function number(): Response
    {
        return new Response('Hi there! ' . time());

        return $this->render('some/template.html.twig', [
            'bla' => 12,
        ]);
    }
}
