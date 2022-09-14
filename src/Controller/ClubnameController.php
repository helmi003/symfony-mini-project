<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Clubs;
use App\Entity\User;
use App\Repository\MyclubRepository;

class ClubnameController extends AbstractController
{
    /**
     * @Route("/clubname/{id}", name="clubname")
     */
    public function voir(Clubs $clubs): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Clubs::class);
        $clubs = $repo->find($clubs);
        if($clubs == null){
            return$this->render('exception/error404.html.twig', ['clubs' =>$clubs]);
        }
        else{
            return $this->render('clubname.html.twig', ['clubs' =>$clubs]);
        }
    }


    /**
     * @Route("/clubname/{id}", name="join")
     */
    public function join(Request $myclub){
        $myclub = new Myclub();
        $form = $this->createFormBuilder($seance)
        ->add('mail', TextType::class)
        ->add('clubname', IntegerType::class, array("label" =>"nombre d'heure"))
        ->add('Valider', SubmitType::class)
        ->getForm ();
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em = $form ->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($myclub);
            $em->flush();
            $myclub = new Myclub();
            $myclub->getFlashBag()->add('notice', 'you are joined now');
            return $this->redirectToRoute('clubs');
        }
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
        return $this->render('clubs.html.twig', ['f' => $form->createView()]);
    }
    
}
