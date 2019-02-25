<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EspacePraticienLoggedInController
 * @package App\Controller
 * @Route("/espace/praticien/logged/in")
 */
class EspacePraticienLoggedInController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_praticien_logged_in/index.html.twig', [
            'controller_name' => 'EspacePraticienLoggedInController',
        ]);
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('You must activate the logout in your security firewall configuration.');
    }


   public function listePatientPraticien(User $user)
    {


        return $this->render(
            'espace_patient_logged_in/index.html.twig',
            [
                'user' => $user
            ]);
    }
}
