<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ConsultationController
 * @package App\Controller
 *
 * @Route("/consultation")
 */
class ConsultationController extends AbstractController
{
    /**
     * @Route("/accueil")
     */
    public function index()
    {
        return $this->render('consultation/index.html.twig', []);
    }
}