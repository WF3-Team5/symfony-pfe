<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\RuntimeException;

/**
 * Class EspacePatientLoggedInController
 * @package App\Controller
 * @Route("/espace/patient/logged/in")
 */
class EspacePatientLoggedInController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_patient_logged_in/index.html.twig', [
            'controller_name' => 'EspacePatientLoggedInController',
        ]);
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('activez le firewall MAIN');
    }
}
