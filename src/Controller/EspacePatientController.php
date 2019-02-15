<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePatientController extends AbstractController
{
    /**
     * @Route("/espace/patient")
     */
    public function index()
    {
        return $this->render('espace_patient/index.html.twig');
    }
}
