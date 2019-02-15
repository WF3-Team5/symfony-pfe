<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InteController extends AbstractController
{
    /**
     * @Route("/inte")
     */
    public function index()
    {
        return $this->render('inte/index.html.twig', [
        ]);
    }
}
