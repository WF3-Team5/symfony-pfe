<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class InscriptionPatientController extends AbstractController
{
    /**
     * @Route("/inscription/patient")
     */
    public function index()
    {
        return $this->render('inscription_patient/index.html.twig');
    }
}
