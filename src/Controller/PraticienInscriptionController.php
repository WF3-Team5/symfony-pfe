<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PraticienInscriptionController extends AbstractController
{
    /**
     * @Route("/praticien/inscription")
     */
    public function index()
    {
        return $this->render('praticien_inscription/index.html.twig', [
            'controller_name' => 'PraticienInscriptionController',
        ]);
    }
}
