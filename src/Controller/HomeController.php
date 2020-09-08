<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


// On reçoit l'argument "letter" défini dans la vue et on définit le nom de la route
/**
 * @Route("/pagination/{letter}", name="alphabetical_pagination")
 */
public function alphabeticalPagination($letter){
    // On retourne à la vue la lettre passée en paramètre (dans l'url, donc la lettre cliquée)
    return $this->render('home/alphabetical_pagination.html.twig', ['clickedLetter' => $letter]);
}
}
