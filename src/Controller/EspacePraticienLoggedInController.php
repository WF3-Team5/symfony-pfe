<?php

namespace App\Controller;

use App\Entity\DossierPatient;
use App\Entity\User;
use App\Entity\ValiditeInscription;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EspacePraticienLoggedInController
 * @package App\Controller
 * @Route("/espace/praticien/logged/in")
 */
class EspacePraticienLoggedInController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository(DossierPatient::class);
        $repoUser=$em->getRepository(User::class);

        $praticien=$this->getUser();
        $dossiers=$repo->findby(['praticien'=>$praticien->getId()]);

        return $this->render('espace_praticien_logged_in/index.html.twig', [
            'dossiers'=>$dossiers,
        ]);
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('You must activate the logout in your security firewall configuration.');
    }

    /**
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/inscription/assistant")
     */
    public function inscriptionAssistant(Request $request, \Swift_Mailer $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user=$this->getUser();
        $validite=new ValiditeInscription();
        $verif=false;

        $email=$request->request->get("email");
        if(isset($email)){
            $verif=filter_var($email, FILTER_VALIDATE_EMAIL);
            $token= $this->genToken(120);
            $validity=$this->getTokenValidity("10080");
        }

        if($verif){
            $message = (new Swift_Message())
                ->setSubject('Inscription au service du Dr.'.$user)
                ->setFrom([$user->getEmailSecretariat() => 'Service du Dr.'.$user])
                ->setTo([$email])
                ->setBody('<html><head></head><body><p>Pour vous inscrire, veuillez cliquer sur le lien suivant:</p><p>http://localhost:8000/espace/assistant/free/zone/assistant/inscription/'.$user->getId().'/'.$token.'</p></body></html>','text/html');

            $mailer->send($message);
            $validite->setPraticien($user->getId());
            $validite->setHash($token);
            $validite->setHashValidity($validity);
            $entityManager->persist($validite);
            $entityManager->flush();
            $this->addFlash("success", "Email envoyé avec succes!");
        }


        return $this->render('espace_praticien_logged_in/inscriptionAssistant.html.twig', [

        ]);
    }

    /**
     * @param $nb_caractere
     * @return string
     */
    public function genToken($nb_caractere)
    {
        $mot_de_passe = "";

        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789";
        $longeur_chaine = strlen($chaine);

        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe .= $chaine[$place_aleatoire];
        }

        return strval($mot_de_passe);
    }

    public function getTokenValidity($interval){
        $date= date('Y-m-d H:i:s', strtotime('+'.$interval.' minutes', strtotime(date('Y-m-d H:i:s'))));
        $dateTime = \DateTime::createFromFormat("Y-m-d H:i:s", $date);
        return $dateTime;
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/consultation/{id}")
     */
    public function consultation(User $user)
    {
        return $this->render('espace_praticien_logged_in/consultation.html.twig', [
            'user'=>$user
        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/historique/{id}")
     */
    public function historiquePatient(User $user)
    {
        return $this->render('espace_praticien_logged_in/historiquePatient.html.twig', [
            'user'=>$user
        ]);
    }

    /**
     * @param User $destinataire
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/send/mail/{id}")
     */
    public function sendMailPatient(User $destinataire, Request $request, \Swift_Mailer $mailer)
    {
        $email=$destinataire->getEmail();
        $praticien=$this->getUser();
        $mail=$request->request->get("primemail");
        $cc=$request->request->get("cc");
        $subject=$request->request->get("subject");
        $msgbody=$request->request->get("msgbody");

        if(!empty($mail) && !$verif=filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $err="Email Destinataire non valide";
        }
        elseif(!empty($cc) && !$verif=filter_var($cc,FILTER_VALIDATE_EMAIL)){
            $err="Email CC non valide";
        }
        elseif(strlen($subject)>150){
            $err="Libéllé du Sujet Trop Long.";
        }
        if(!empty($err)){
            $this->addFlash('error',$err);
        }
        else{
            $msgbody=nl2br($msgbody);

            $message = (new Swift_Message())
                ->setSubject($subject)
                ->setFrom([$praticien->getEmailSecretariat() => 'Dr.'.$praticien->getLastName()]);
            if(isset($mail)&& !empty($mail)) {
                $message->setTo([$mail]);
            }

            if(isset($cc)&& !empty($cc)){
                $message->setCc($cc);
            }
                $message->setBody('<html><head></head><body><p>'.$msgbody.'</p></body></html>','text/html');

            $mailer->send($message);
            $this->addFlash('success', 'email correctement envoyé');
        }

        return $this->render('espace_praticien_logged_in/sendMail.html.twig', [
            'destinataire'=>$destinataire,
            'email'=>$email,
            'cc'=>$cc,
            'subject'=>$subject,
            'msgbody'=>$msgbody,
        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/schedule/rendez-vous/")
     */
    public function mesRendezvous()
    {
        $user=$this->getUser();
        return $this->render('espace_praticien_logged_in/mesRdv.html.twig', [
            'praticien'=>$user,
        ]);
    }
}
