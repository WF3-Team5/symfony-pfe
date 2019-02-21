<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspacePatientController
 * @package App\Controller
 * @Route("/espace/patient")
 */
class EspacePatientController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_patient/index.html.twig');
    }

    /**
     * @Route("/connexion")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        dump($request);

        if (!empty($error)){
            $this->addFlash('error', 'Vos identifiants sont incorrects');
        }

        return $this->render(
            'espace_patient/connexion/connexion.html.twig',
            [
                'last_username' => $lastUsername
            ]
        );
    }
}
