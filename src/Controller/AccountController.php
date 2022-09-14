<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;
use App\Repository\MyclubRepository;
class AccountController extends AbstractController
{
    /**
     * @Route("/account/{id}", name="account")
     */
    public function voir(User $user): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(User::class);
        $user = $repo->find($user);
        if($user == null){
            return$this->render('exception/error404.html.twig', ['user' =>$user]);
        }
        else{
            return $this->render('account.html.twig', ['user' =>$user]);
        }
    }
    /**
     * @Route("/account/{id}", name="account")
     */
    public function index(Request $request,MyclubRepository $repo): Response
    {
        $form = $this -> createFormBuilder ( )
        ->getForm ();
        $form ->handleRequest ($request);
        if ($form->isSubmitted()){
            $data= $form->getData();
            $myClubs= $repo->recherche($data);
        }else{
            $myClubs=$repo->findAll();
        }
       return $this -> render ( 'account.html.twig',['myClubs'=>$myClubs,'f'=>$form->createView()] );
    }
    
}
