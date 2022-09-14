<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\SeancesRepository;

class MembershipController extends AbstractController
{
    /**
     * @Route("/membership", name="membership")
     */
    public function index(Request $request,SeancesRepository $repo): Response
    {
        $form = $this -> createFormBuilder ( )
        ->getForm ();
        $form ->handleRequest ($request);
        if ($form->isSubmitted()){
            $data= $form->getData();
            $lesSeances= $repo->recherche($data);
        }else{
            $lesSeances=$repo->findAll();
        }
       return $this -> render ( 'membership.html.twig',['lesSeances'=>$lesSeances,'f'=>$form->createView()] );
    }
}