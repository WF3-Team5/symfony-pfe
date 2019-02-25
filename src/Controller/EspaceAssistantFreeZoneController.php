<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspaceAssistantFreeZoneController
 * @package App\Controller
 * @Route("/espace/assistant/free/zone")
 */
class EspaceAssistantFreeZoneController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_assistant_free_zone/index.html.twig', []);
    }

    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/connexion")
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils )
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        if (!empty($error)){
            $this->addFlash('error', 'Vos identifiants sont incorrects');
        }

        return $this->render('espace_assistant_free_zone/connexion.html.twig',
            [
                'last_username'=>$lastUsername

            ]);
    }
}
