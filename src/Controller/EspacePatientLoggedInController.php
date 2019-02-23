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
        if(!$this->userIsActivated())
        {
            $this->addFlash("error", "Vous n'avez pas encore activé votre compte. Un email contenant un lien d'activation vous a été envoyé lors de votre inscription.");
            return $this->redirectToRoute('app_espacepatientloggedin_logout');
        }

        return $this->render('espace_patient_logged_in/index.html.twig', [

        ]);
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('activez le firewall MAIN');
    }


    /**
     * @return bool
     */
     public function userIsActivated()
    {
        $user=$this->getUser();
        $etat=$user->getEtat();
        if($etat!=="active"){
            return false;
        }
        else{
            return true;
        }
    }
}
