<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Seances;
use App\Form\SeancesType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Repository\SeancesRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class SeancesController extends AbstractController
{
    /**
     * @Route("/inscriseance", name="inscriseance")
     */
    public function index(Request $request,SeancesRepository $repo): Response
    {
        $form = $this -> createFormBuilder ( )
        -> add ( 'critere' , TextType :: class,["required"=>false] )
        -> add ( 'chercher' , SubmitType :: class , [ 'label' => 'Chercher' ])
        ->getForm ();
        $form ->handleRequest ($request);
        if ($form->isSubmitted()){
            $data= $form->getData();
            $lesSeances= $repo->recherche($data);
        }else{
            $lesSeances=$repo->findAll();
        }
       return $this -> render ( 'inscriseance/seance.html.twig',['lesSeances'=>$lesSeances,'f'=>$form->createView()] );
    }

    /**
     * @Route("/inscriseance/voir/{id} ", name="inscriseance_voir")
     */
    public function voir(Seances $seance): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Seances::class);
        $seance = $repo->find($seance);
        if($seance == null){
            return$this->render('exception/error404.html.twig', ['seance' =>$seance]);
        }
        else{
            return $this->render('inscriseance/voir.html.twig', ['seance' =>$seance]);
        }
    }

    /**
     * @Route("/inscriseance/ajouter", name="inscriseance_ajouter")
     */
    public function ajouter(Request $request){
        $seance = new Seances();
        $form=$this->createForm(SeancesType::class,$seance);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($seance);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'Seance bien ajouté');
            return $this->redirectToRoute('inscriseance');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscriseance/ajouter.html.twig', ['f' => $form->createView()]);
    }


    /**
     * @Route("/inscriseance/supprimer/{id} ", name="inscriseance_supprimer")
     */
    public function supprimer(Seances $seance): Response
    {
        $em=$this->getDoctrine()->getManager();
        $item = $em->getRepository(Seances::class)->find($seance);
        $em->remove($item);
        $em->flush();
        $session = new Session();
        $session->getFlashBag()->add('notice', "La seance à été supprimer");
        return $this->redirectToRoute('inscriseance');
    }

    /**
     * @Route("/inscriseance/modifier/{id} ", name="inscriseance_modifier")
     */
    public function modifier(Request $request,$id){
        $seance = new Seances();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Seances::class);
        $seance = $repo->find($id);
        if($seance == null){
            return$this->render('exception/error404.html.twig', ['seance' =>$seance]);
        }
        else{
        // $form=$this->createForm(SeancesType::class,$seance);
        // $form->handleRequest($request);
        $form = $this->createFormBuilder($seance)
        ->add('date', BirthdayType::class,["widget" => "single_text"])
        ->add('heure', TextType::class)
        ->add('nbheure', IntegerType::class, array("label" =>"nombre d'heure"))
        ->add('Valider', SubmitType::class)
        ->getForm ();
        $form->handleRequest($request);
        if($form->isSubmitted()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($seance);
            $em->flush();
            $session = new Session();
            $session->getFlashBag()->add('notice', 'seance est modifier');
            return $this->redirectToRoute('inscriseance');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('inscriseance/modifier.html.twig', ['f' => $form->createView()]);
        }
    }
}
