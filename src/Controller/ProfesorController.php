<?php

namespace App\Controller;

use App\Entity\Profesor;
use App\Entity\Especialidad;
use App\Entity\Alumno;
use App\Entity\Asignatura;
use ContainerFMqlFhy\getDoctrineService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;




class ProfesorController extends AbstractController
{
    #[Route('/profesor/insertar', name: 'profesor')]
    public function insert(EntityManagerInterface $entityManager): Response
    {
        $profesor = new Profesor();
        $profesor->setNombre('Juan');
        $profesor->setApellido('Garcia');
        $profesor->setNif('12345678A');
        $profesor->setFechaNacimienito(new \DateTime('1990-01-01'));
        $entityManager->persist($profesor);
        $entityManager->flush();
        return $this->render('profesor/index.html.twig', [
            'controller_name' => 'ProfesorController',
        ]);
    }
    
   
    #[Route('/profesor/listar' , name: 'app_profesor_listar')]
    public function listar(EntityManagerInterface $entityManager): Response
    {
        $Profesor = $entityManager->getRepository(Profesor::class)->findAll();
        return $this->render('profesor/index.html.twig', [
            'Profesor' => $Profesor,
        ]);
    }

    #[Route('/profesor/show/{id}' , name: 'app_profesor_show')]
    public function show(EntityManagerInterface $entityManager,$id): Response
    {
        $profesor = $entityManager->getRepository(Profesor::class)->find($id);
        return $this->render('profesor/showProfesor.html.twig', [
            'profesor' => $profesor,
        ]);
    }

    #[Route('/especialidad/mostrar/{id}' , name: 'listar_profesores_especialidad')]
    public function listarProfesoresEspecialidad(EntityManagerInterface $entityManager,$id): Response
    {
        $especialidad = $entityManager->getRepository(Especialidad::class)->find($id);
        return $this->render('especialidad/listarProfesores.html.twig', [
            'especialidad' => $especialidad,
        ]);
    }
    #[Route('/alumno/listado/asignatura' )]
    public function listado_asignatura(EntityManagerInterface $entityManager): Response
    {
        $alumnos = $entityManager->getRepository(Alumno::class)->findByModulo('matematicas');
        // var_dump(serialize($alumnos));
        // // return new Response('');
        return $this->render('alumno/listarAsignatura.html.twig', [
            'alumnos' => $alumnos,]);
    }

    #[Route('/alumno/listado/asignatura2' )]
    public function listado_asignatura2(EntityManagerInterface $entityManager): Response
    {
        $alumnos = $entityManager->getRepository(Alumno::class)->findBy(['nombre' => 'Pepe','apellido' => 'Rodriguez'],['apellido' => 'ASC','nombre' => 'ASC']);
        var_dump(serialize($alumnos));
        return new Response('');
    }
    
}   
