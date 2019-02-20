<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class AdmloginController
 * @package App\Controller
 * @Route("/adm")
 */
class AdmloginController extends AbstractController
{
    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        if(!empty($error)){
            $this->addFlash("error","Identifiants incorrects");
        }
        return $this->render('admlogin/index.html.twig', [
            'error'=>$error,
            'lastUsername'=>$lastUsername,
        ]);
    }

    /**
     * @Route("/adm/logout")
     */
    public function logout()
    {
        return $this->redirectToRoute("app_admin_dboard_index");

    }
}
