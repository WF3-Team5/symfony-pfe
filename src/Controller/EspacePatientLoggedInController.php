<?php

namespace App\Controller;


use App\Entity\Booking;
use App\Entity\Praticien;
use App\Form\BookingType;
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
        $data["payload"]="<a class=\"btn btn-outline-danger ml-5 text-orange\" href=\"/espace/patient/logged/in/appointment/reservation/creneau/".$praticienId."\">Vérifier les disponibilités</a>";
        return new JsonResponse(json_encode($data));
    }


    /**
     * @Route("/appointment/reservation/creneau/{id}")
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

            foreach($events as $event){
                $deb=$event->getBeginAt();
                $fin=$event->getEndAt();
                if($booking->getBeginAt()>=$deb && $booking->getBeginAt()<=$fin){
                    $overlap=true;
                }
            }
            if(!$overlap){
                $booking->setPraticien($praticien);
                $booking->setUser($user);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($booking);
                $entityManager->flush();
            }
            else{
                $this->addFlash("error","Le rendez-vous désiré empiète sur un autre. Veuillez rectifier.");
                $booking=null;
                $booking=new Booking();
            }

        }



        return $this->render('rdv_patient/resa.html.twig', [
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
