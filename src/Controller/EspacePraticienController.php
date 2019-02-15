<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspacePraticienController extends AbstractController
{
    /**
     * @Route("/espace/praticien")
     */
    public function index()
    {
        return $this->render('espace_praticien/index.html.twig');
    }
}
