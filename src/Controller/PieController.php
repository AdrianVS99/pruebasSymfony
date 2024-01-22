<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\Menu;
use App\Repository\PieRepository;


class PieController extends AbstractController
{
   private $pieRepository;

    public function __construct ( PieRepository $pieRepository )
    {
        $this->pieRepository = $pieRepository;
    }
    #[Route("/pie", name:"pie_pie")]
    public function pie(): Response
    {
        $pie = $this->pieRepository->findFooter();
        return $this->render('menu/pie.html.twig',array("pie"=>$pie));
    }
}
