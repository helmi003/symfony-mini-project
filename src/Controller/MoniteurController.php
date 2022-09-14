<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Moniteur;
use App\Entity\Seances;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Form\MoniteurType;
use App\Form\SeancesType;
use App\Repository\MoniteurRepository;
use App\Repository\SeancesRepository;
use Symfony\Component\Validator\Constraints as Assert;

class MoniteurController extends AbstractController
{
    /**
     * @Route("/inscrimoniteur", name="inscrimoniteur")
     */
    public function index(Request $request,MoniteurRepository $repo): Response
    {
        $form = $this -> createFormBuilder ( )
        -> add ( 'critere' , TextType :: class,["required"=>false] )
        -> add ( 'chercher' , SubmitType :: class , [ 'label' => 'Chercher' ])
        ->getForm ();
        $form ->handleRequest ($request);
        if ($form->isSubmitted()){
            $data= $form->getData();
            $lesMoniteur= $repo->recherche($data);
        }else{
            $lesMoniteur=$repo->findAll();
        }
       return $this -> render ( 'inscrimoniteur/moniteur.html.twig',['lesMoniteur'=>$lesMoniteur,'f'=>$form->createView()] );
    }

    /**
     * @Route("/inscrimoniteur/voir/{id} ", name="inscrimoniteur_voir")
     */
    public function voir(Moniteur $moniteur): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Moniteur::class);
        $moniteur = $repo->find($moniteur);
        if($moniteur == null){
            return$this->render('exception/error404.html.twig', ['moniteur' =>$moniteur]);
        }
        else{
            return $this->render('inscrimoniteur/voir.html.twig', ['moniteur' =>$moniteur]);
        }
    }

    /**
     * @Route("/inscrimoniteur/ajouter", name="inscrimoniteur_ajouter")
     */
    public function ajouter(Request $request){
        $moniteur = new Moniteur();
        $form=$this->createForm(MoniteurType::class,$moniteur);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($moniteur);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'moniteur bien ajouté');
            return $this->redirectToRoute('inscrimoniteur');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscrimoniteur/ajouter.html.twig', ['f' => $form->createView()]);
    }


    /**
     * @Route("/inscrimoniteur/supprimer/{id} ", name="inscrimoniteur_supprimer")
     */
    public function supprimer(Moniteur $moniteur, Seances $seance): Response
    {
        $em=$this->getDoctrine()->getManager();
        $em2=$this->getDoctrine()->getManager();
        $item = $em->getRepository(Moniteur::class)->find($moniteur);
        $item2 = $em2->getRepository(Seances::class)->find($seance);
        if ($item2 == null){}
        else {
            $em2->remove($item2);
            $em2->flush();
        }
        $em->remove($item);
        $em->flush();
        $session = new Session();
        $session->getFlashBag()->add('notice', "Le moniteur à été supprimer");
        return $this->redirectToRoute('inscrimoniteur');
    }

    /**
     * @Route("/inscrimoniteur/modifier/{id} ", name="inscrimoniteur_modifier")
     */
    public function modifier(Request $request,$id){
        $moniteur = new Moniteur();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Moniteur::class);
        $moniteur = $repo->find($id);
        if($moniteur == null){
            return$this->render('exception/error404.html.twig', ['moniteur' =>$moniteur]);
        }
        else{
        $form=$this->createForm(MoniteurType::class,$moniteur);
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($moniteur);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'moniteur est modifier');
            return $this->redirectToRoute('inscrimoniteur');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscrimoniteur/modifier.html.twig', ['f' => $form->createView()]);
        }
    }


    
}
