<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RdvPatientController
 * @package App\Controller
 * @Route("/espace/patient")
 */
class RdvPatientController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('rdv_patient/index.html.twig', [
            'controller_name' => 'RdvPatientController',
        ]);
    }

    /**
     * @Route("/prendre-rdv")
     */
    public function rendezVous()
    {
        return $this->render(
            'rdv_patient/index.html.twig'
        );
    }
}
