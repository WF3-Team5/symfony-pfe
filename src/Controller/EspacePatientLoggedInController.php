<?php

namespace App\Controller;


use App\Entity\Praticien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\RuntimeException;
use App\Entity\Specialite;

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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/appointment")
     */
    public function appointment()
    {
        if(!$this->userIsActivated())
        {
            $this->addFlash("error", "Vous n'avez pas encore activé votre compte. Un email contenant un lien d'activation vous a été envoyé lors de votre inscription.");
            return $this->redirectToRoute('app_espacepatientloggedin_logout');
        }
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository(Specialite::class);
        $specialites=$repo->selectDistinctSpecialite();

        return $this->render('rdv_patient/index.html.twig', [
            'specialites'=>$specialites
        ]);
    }

    /**
     * @Route("/service/appointment/liste/medic")
     * @param Request $request
     * @return JsonResponse
     */
    public function serviceListMedicPourUneSpecialite(Request $request)
    {
        $specialite=$request->request->get("specialite");
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository(Praticien::class);
        $practiciens=$repo->findBy(["speciality"=>$specialite],['speciality'=>'ASC']);
        $data=array();
        $data["payload"]="<h3>Rechercher une spécialisation :</h3><select id='medic' name='toubib'>";
        if(empty($practiciens)){
            $data["status"]="empty";
            $data["payload"]="<h3>Rechercher un médecin :</h3><p>Aucun médecin trouvé...</p>";
        }
        else{
            $data["status"]="ok";
            foreach($practiciens as $p){
                $data['payload'].="<option value='".$p->getId()."'>".ucfirst($p->getFirstName())." ".strtoupper($p->getLastName())."</option>";
            }
            $data["payload"].="</select>";
        }
        return new JsonResponse(json_encode($data));
    }

    /**
     * @Route("/appointment/reservation/creneau")
     */
    public function resaCreneau()
    {

        return $this->render('rdv_patient/resa.html.twig', [

        ]);
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
