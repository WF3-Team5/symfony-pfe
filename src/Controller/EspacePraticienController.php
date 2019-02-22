<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EspacePraticienController
 * @package App\Controller
 * @Route("/espace/praticien")
 */
class EspacePraticienController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_praticien/index.html.twig');
    }
}
