<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Clubs;
use App\Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

class ClubsController extends AbstractController
{
    /**
     * @Route("/clubs", name="clubs")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Clubs::class);
        $lesClubs = $repo->findAll();
        return $this->render('clubs.html.twig', ['lesClubs' =>$lesClubs]);
    }
    
}
