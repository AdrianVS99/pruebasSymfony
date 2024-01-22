<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EspecialidadController extends AbstractController
{
    #[Route('/especialidad', name: 'app_especialidad')]
    public function index(): Response
    {
        return $this->render('especialidad/index.html.twig', [
            'controller_name' => 'EspecialidadController',
        ]);
    }
}
