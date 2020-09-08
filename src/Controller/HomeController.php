<?php

namespace App\Controller;

use App\Entity\Variete;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Variete::class);

        $varietes = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'varietes' => $varietes,
        ]);
    }


     
    /**
     * On reçoit l'argument "letter" défini dans la vue et on définit le nom de la route
     * @Route("/pagination/{letter}", name="alphabetical_pagination")
     */
    public function alphabeticalPagination($letter){
        // On retourne à la vue la lettre passée en paramètre (dans l'url, donc la lettre cliquée)
        return $this->render('home/alphabetical_pagination.html.twig', ['clickedLetter' => $letter]);
    }
}
