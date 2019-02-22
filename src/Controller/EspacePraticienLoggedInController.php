<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePraticienLoggedInController extends AbstractController
{
    /**
     * @Route("/espace/praticien/logged/in", name="espace_praticien_logged_in")
     */
    public function index()
    {
        return $this->render('espace_praticien_logged_in/index.html.twig', [
            'controller_name' => 'EspacePraticienLoggedInController',
        ]);
    }
}
