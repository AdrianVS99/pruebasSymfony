<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/number', name: 'lucky_number')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
    }

    #[Route('/lucky/factorial/{id}')]
    public function factorial($id): Response
    {
       
        $factorial = 1;
        if ($id==1 || $id==0)
            $factorial = 1;
        else
        {
            for($i = 1;$i < $id ;$i++)
                $factorial = $id * $i;
        }
            
        return $this->render('lucky/hello.html.twig', [
            'msg' => "El factorial es {$factorial}",
        ]);
    }
    #[Route('/lucky/ordenar/{a}/{b}')]
    public function ordenar($a,$b): Response
    {
       
       
        if ($a>$b)
        {
            $aux = $a;
            $a = $b;
            $b = $aux;
        }
        return $this->render('lucky/hello.html.twig', [
            'msg' => "Numeros ordenados {$a} {$b}",
        ]);
    }
    #[Route('/lucky/esprimo/{a}')]
    public function esprimo($a): Response
    {
        $i = 2;
        $primo = false;
        while($i!=$a)
        {
            if($a%$i==0)
            {
                $primo = true;
                $i++;
            }
            else

                break;
        }
       
        if ($primo)
            return $this->render('lucky/hello.html.twig', [
                'msg' => "El numero no es primo numero introducido:{$a}",
            ]);
        else
            return $this->render('lucky/hello.html.twig', [
                'msg' => "El numero es primo numero introducido:{$a}",
            ]);
    }
}
