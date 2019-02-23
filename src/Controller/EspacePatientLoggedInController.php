<?php

namespace App\Controller;


use App\Entity\User;
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
        $user=$this->getUser();

        return $this->render('espace_patient_logged_in/index.html.twig',
            [
                "user"=>$user,
            ]
        );
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('activez le firewall MAIN');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/donnees_perso")
     */
    public function donneesPerso()
    {
        //$repository = $this->getDoctrine()->getRepository(User::class);
        $user = $this->getUser();
        return $this->render('espace_patient_logged_in/donnees_perso/donneesPerso.html.twig',
            [
                "user"=>$user,
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/donnees_medic")
     */
    public function donneesMedic()
    {
        $user=$this->getUser();
        return $this->render('espace_patient_logged_in/donnees_medic/donneesMedic.html.twig',
            [
                "user"=>$user,
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/prendre_rdv")
     */
    public function rendezVous()
    {
        $user=$this->getUser();
        return $this->render('rdv_patient/index.html.twig',
            [
                "user" => $user,
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/contacter_praticien")
     */
    public function contacter(){
        $user=$this->getUser();
        return $this->render('/espace_patient_logged_in/contacter/contacter.html.twig',
            [
                "user" => $user,
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/documents")
     */
    public function documents()
    {
        $user=$this->getUser();
        return $this->render('espace_patient_logged_in/documents/documents.html.twig',
            [
                "user" => $user,
            ]
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/rechercher_praticien")
     */
    public function rechercher()
    {
        $user=$this->getUser();
        return $this->render('/espace_patient_logged_in/recherche/recherche.html.twig',
            [
                "user" => $user,
            ]

        );
    }

    /**
     * @Route("/prendre-rdv")
     */
    public function rdv()
    {
        $user=$this->getUser();
        return $this->render('espace_patient_logged_in/rdv_patient/index.html.twig',
            [
                "user" => $user,
            ]
        );
    }
}
