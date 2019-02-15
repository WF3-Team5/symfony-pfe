<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/")
     */
    public function redir()
=======
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/")
     */
    public function redirectHome()
>>>>>>> 8417a612acbd48800457b658921ed294ee9c13d1
    {
        return $this->redirectToRoute("app_home_index");
    }

    /**
     * @Route("/home")
     */
    public function index()
    {
<<<<<<< HEAD
        return $this->render('home/index.html.twig');
=======
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
>>>>>>> 8417a612acbd48800457b658921ed294ee9c13d1
    }
}
