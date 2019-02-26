<?php

namespace App\Controller;


use App\Entity\Booking;
use App\Entity\Praticien;
use App\Entity\Specialite;
use App\Form\BookingType;
use App\Form\SimpleUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

        $user=$this->getUser();
        return $this->render('espace_patient_logged_in/donnees_perso/donneesPerso.html.twig',
        [
            "user"=>$user,
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
     * @Route("/prendre-rdv")
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
        $user=$this->getUser();
        return $this->render('espace_patient_logged_in/rdv_patient/index.html.twig', [
            'specialites'=>$specialites,
            'user'=>$user,
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
        $data["payload"]="<option value='aucun'>-- Choisissez --</option>";
        if(empty($practiciens)){
            $data["status"]="empty";
            $data["payload"]="<h3>Rechercher un médecin :</h3><p>Aucun médecin trouvé...</p>";
        }
        else{
            $data["status"]="ok";
            foreach($practiciens as $p){
                $data['payload'].="<option value='".$p->getId()."'>".ucfirst($p->getFirstName())." ".strtoupper($p->getLastName())."</option>";
            }
        }
        return new JsonResponse(json_encode($data));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/service/appointment/make/btn/route")
     */
    public function serviceSetResaBtnRoute(Request $request)
    {
        $praticienId=$request->request->get("praticienId");
        $data["status"]="ok";
        $data["payload"]="<a class=\"btn btn-outline-danger ml-5 text-orange\" href=\"/espace/patient/logged/in/reservation/creneau/".$praticienId."\">Vérifier les disponibilités</a>";
        return new JsonResponse(json_encode($data));
    }


    /**
     * @Route("/reservation/creneau/{id}")
     * @param Praticien $praticien
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resaCreneau(Praticien $praticien, Request $request)
    {
        $user=$this->getUser();
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $repo=$em->getRepository(Booking::class);
            $events=$repo->findBy(["praticien"=>$praticien]);
            $overlap=false;
            $overtime=false;

            foreach($events as $event){
                $deb=$event->getBeginAt();
                $fin=$event->getEndAt();
                if($booking->getBeginAt()>=$deb && $booking->getBeginAt()<$fin) {
                    $overlap = true;
                }
            }
            $startTime=date("Y-m-d",$booking->getBeginAt()->getTimestamp());
            $s= strtotime($startTime."09:00");
            $e= strtotime($startTime."18:00");
            if($booking->getBeginAt()->getTimestamp()<$s || $booking->getEndAt()->getTimestamp()>$e){
                $overtime=true;
            }
            if(!$overlap && !$overtime){
                $booking->setPraticien($praticien);
                $booking->setUser($user);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($booking);
                $entityManager->flush();
            }
            else{
                if($overlap){
                    $this->addFlash("error","Le rendez-vous désiré empiète sur un autre. Veuillez rectifier.");
                }
                if($overtime){
                    $this->addFlash("error","Le rendez-vous excede les horaires d'ouverture. Veuillez rectifier.");
                }
                $booking=null;
                $booking=new Booking();
            }

        }

        return $this->render('espace_patient_logged_in/rdv_patient/resa.html.twig', [
            'praticien'=>$praticien,
            'user'=>$user,
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/appointment/delete/{id}")
     */
    public function deleteappointment(Booking $booking)
    {
        $praticienId=$booking->getPraticien()->getId();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($booking);
        $entityManager->flush();
        return $this->redirectToRoute('app_espacepatientloggedin_resacreneau',['id'=>$praticienId]);
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
     * @Route("/edition")
     */
    public function modifDonneesPerso(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        if (is_null($user)){
            return $this->redirectToRoute('app_espacepatientfreezone_inscription');
        }

        $form = $this->createForm(SimpleUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Votre modification a bien été enregistrée');


                return $this->redirectToRoute(
                    'app_espacepatientloggedin_donneesperso'
                );
            }else{
                $this->addFlash('error','Le formulaire contient des erreurs');
            }
        }

        $user = $this->getUser();
        return $this->render(
            'espace_patient_logged_in/donnees_perso/donneesPersoEdit.html.twig',
            [
                'form' => $form->createView(),
                "user" => $user,
            ]
        );
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
