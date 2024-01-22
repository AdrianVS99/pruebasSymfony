<?php
// src/Controller/ProductoController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// tipos form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

// clase
use App\Entity\Product;
// form
use App\Form\ProductType;

// Constraints
use Symfony\Component\Validator\Constraints\Currency;

#[Route("/producto")]

class ProductController extends AbstractController
{
    #[Route("/NewFormClase", name:"NewFormClase")]

    public function claseNewForm( EntityManagerInterface $em, Request $request)
    {
       
        $producto = new Product();
        $form = $this->createForm(ProductType::class, $producto );
       
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($producto);
            $em->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('product/form.html.twig', array('form' => $form->createView(),));
    }
    
    
    #[Route("/EditFormClase/{id}", name:"EditFormClase")]

     public function EditFormClase( EntityManagerInterface $em, Request $request, $id )
    {
       
        $producto = $em->getRepository(Product::class)->find($id);
		
        $form = $this->createForm(ProductType::class, $producto );
       
        $form->handleRequest( $request );

         if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($producto);
            $em->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('product/form.html.twig', array('form' => $form->createView(),));
    }
    
    
    
    #[Route("/EditFormSinClase/{id}", name:"EditFormSinClase")]

     public function EditFormSinClase( EntityManagerInterface $em,Request $request, $id )
    {
       
        $producto = $em->getRepository(Product::class)->find($id);
        
        $defaultData = array('name' => $producto->getName(), 
                            'price' => $producto->getPrice(), 
                            'description' => $producto->getDescription(), );
      

        
        $form = $this->createFormBuilder($defaultData)
        ->add('name', TextType::class)
        // Validacion moneda
        ->add('price', MoneyType::class)
        ->add('description', TextType::class)
        ->add('Send', SubmitType::class)
        ->getForm();
         
         
              
        $form->handleRequest( $request );

         if ($form->isSubmitted() && $form->isValid()) {
            // array con valores form field => value
            $data = $form->getData();
            
        
            $producto->setName($data[ 'name' ]);
            $producto->setPrice($data[ 'price' ]);
            $producto->setDescription($data[ 'description' ]);
           
           
            $em->persist($producto);
            $em->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('product/form.html.twig', array('form' => $form->createView(),));
    }
    
    
    #[Route("/NewFormSinClase", name:"NewFormSinClase")]

    public function NewFormSinClase( EntityManagerInterface $em, Request $request )
    {
        $defaultData = array();
         
        $form = $this->createFormBuilder($defaultData)
        ->add('name', TextType::class)
        // Validacion moneda
         ->add('price', MoneyType::class )
        ->add('description', TextType::class)
        ->add('Send', SubmitType::class)
        ->getForm();
 
        $form->handleRequest( $request );

         if ($form->isSubmitted() && $form->isValid()) {
            // array con valores form field => value
            $data = $form->getData();
            
           
            $producto = new Product();
            $producto->setName($data[ 'name' ]);
            $producto->setPrice($data[ 'price' ]);
            $producto->setDescription($data[ 'description' ]);
           
            $em->persist($producto);
            $em->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('product/form.html.twig', array('form' => $form->createView(),));
    }
    
    
    
  
}
