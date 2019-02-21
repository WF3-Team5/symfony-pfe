<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class QuestionnaireMedicalController extends AbstractController
{
    /**
     * @Route("/questionnaire/medical")
     */
    public function index()
    {
        return $this->render('questionnaire_medical/index.html.twig', []);
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
