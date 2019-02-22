<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePraticienFreeZoneController extends AbstractController
{
    /**
     * @Route("/espace/praticien/free/zone", name="espace_praticien_free_zone")
     */
    public function index()
    {
        return $this->render('espace_praticien_free_zone/index.html.twig', [
            'controller_name' => 'EspacePraticienFreeZoneController',
        ]);
    }
}
