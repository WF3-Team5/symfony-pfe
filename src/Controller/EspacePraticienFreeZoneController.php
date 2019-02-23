<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class EspacePraticienFreeZoneController extends AbstractController
{
    /**
     * @Route("/espace/praticien/free/zone")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
dump($error);
        if (!empty($error)) {
            $this->addFlash("error", "Identifiants incorrects");
            return $this->render('espace_praticien_free_zone/index.html.twig', [
                'error' => $error,
                'lastUsername' => $lastUsername,
            ]);
        }

        return $this->render('espace_praticien_free_zone/index.html.twig', [

        ]);
    }

}
