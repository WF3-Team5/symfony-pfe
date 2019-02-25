<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/sommaire")
     */
    public function sommaire()
    {
        
        return $this->render('consultation/cadran 1/sommaire.html.twig',
            [
            ]);
    }


}