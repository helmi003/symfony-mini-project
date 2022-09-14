<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Adheren;
use App\Entity\Seances;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Form\AdherenType;
use App\Repository\AdherenRepository;
use App\Form\SeancesType;
use App\Repository\SeancesRepository;
use Symfony\Component\Validator\Constraints as Assert;

class InscriController extends AbstractController
{
    /**
     * @Route("/inscriadheren", name="inscriadheren")
     */
    public function index(Request $request,AdherenRepository $repo): Response
    {
        $form = $this -> createFormBuilder ( )
        -> add ( 'critere' , TextType :: class,["required"=>false] )
        -> add ( 'chercher' , SubmitType :: class , [ 'label' => 'Chercher' ])
        ->getForm ();
        $form ->handleRequest ($request);
        if ($form->isSubmitted()){
            $data= $form->getData();
            $lesAdherens= $repo->recherche($data);
        }else{
            $lesAdherens=$repo->findAll();
        }
       return $this -> render ( 'inscriadheren/adheren.html.twig',['lesAdherens'=>$lesAdherens,'f'=>$form->createView()] );
    }

    /**
     * @Route("/inscriadheren/voir/{id} ", name="inscriadheren_voir")
     */
    public function voir(Adheren $adheren): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Adheren::class);
        $adheren = $repo->find($adheren);
        if($adheren == null){
            return$this->render('exception/error404.html.twig');
        }
        else{
            return $this->render('inscriadheren/voir.html.twig', ['adheren' =>$adheren]);
        }
    }

    /**
     * @Route("/inscriadheren/ajouter", name="inscriadheren_ajouter")
     */
    public function ajouter(Request $request){
        $adheren = new Adheren();
        $form=$this->createForm(AdherenType::class,$adheren);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($adheren);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'adhéren bien ajouté');
            return $this->redirectToRoute('inscriadheren');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscriadheren/ajouter.html.twig', ['f' => $form->createView()]);
    }


    /**
     * @Route("/inscriadheren/supprimer/{id} ", name="inscriadheren_supprimer")
     */
    public function supprimer(Adheren $adheren,Seances $seance): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em2=$this->getDoctrine()->getManager();
        $item = $em->getRepository(Adheren::class)->find($adheren);
        $item2 = $em2->getRepository(Seances::class)->find($seance);
        if ($item2 == null){}
        else {
            $em2->remove($item2);
            $em2->flush();
        }
        $em->remove($item);
        $em->flush();
        $session = new Session();
        $session->getFlashBag()->add('notice', "L'adheren à été supprimer");
        return $this->redirectToRoute('inscriadheren');
    }

    /**
     * @Route("/inscriadheren/modifier/{id} ", name="inscriadheren_modifier")
     */
    public function modifier(Request $request,$id){
        $adheren = new Adheren();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Adheren::class);
        $adheren = $repo->find($id);
        if($adheren == null){
            return$this->render('exception/error404.html.twig', ['adheren' =>$adheren]);
        }
        else{
        $form=$this->createForm(AdherenType::class,$adheren);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($adheren);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'adhéren est modifier');
            return $this->redirectToRoute('inscriadheren');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscriadheren/modifier.html.twig', ['f' => $form->createView()]);
        }
    }


    
}
