<?php

namespace App\Controller;

use App\Entity\Assistant;
use App\Entity\Praticien;
use App\Form\RestEmailType;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

/**
 * Class PasswordManagerController
 * @package App\Controller
 * @Route("/forgot/password")
 */
class PasswordManagerController extends AbstractController
{
    /**
     * @param $userType
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/email/form/{userType}")
     */
    public function index($userType)
    {

        return $this->render('password_manager/index.html.twig',[
                'userType'=>$userType,
            ]);
    }


    /**
     * @Route("/{userType}")
     * @param Request $request
     * @param $userType
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function resetPassword(Request $request, $userType, \Swift_Mailer $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        switch ($userType){
            case "patient":
                $repo=$entityManager->getRepository(User::class);
            break;

            case "admin":
                $repo=$entityManager->getRepository(User::class);
            break;

            case "praticien":
                $repo=$entityManager->getRepository(Praticien::class);
            break;

            case "assistant":
                $repo=$entityManager->getRepository(Assistant::class);
            break;
            default:
                return $this->redirectToRoute('home/index.html.twig', array());
        }

        $email=$request->request->get("fpemail");
        $verif=filter_var($email, FILTER_VALIDATE_EMAIL);
        $token= $this->genToken(120);
        $validity=$this->getTokenValidity("30");

        if ($verif) {
            $user = $repo->findOneByEmail($email);
            if ($user !== null) {
                $message = (new Swift_Message())
                    ->setSubject('Réinitialisation de votre mot de passe')
                    ->setFrom(['wf3.team5@gmail.com' => 'Mediglob support'])
                    ->setTo([$email])
                    ->setBody('<html><head></head><body><p>Pour réinitialiser votre mot de passe veuillez cliquer sur le lien suivant:</p><p>http://localhost:8000/forgot/password/reset/'.$userType.'/'.$token.'</p></body></html>','text/html');

                $mailer->send($message);
                $user->setHash($token);
                $user->setHashValidity($validity);
                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash("success", "Email envoyé avec succes!");

                if($userType=="admin"){

                    return $this->render('admlogin/index.html.twig');
                }
                else{
                    return $this->redirectToRoute('app_passwordmanager_index',['userType'=>$userType]);
                }
            }
        }
        else{
            $this->addFlash("error", "Email non valide!");
            if($userType=="admin"){

                return $this->render('admlogin/index.html.twig');
            }
            else{
                return $this->redirectToRoute('app_passwordmanager_index',['userType'=>$userType]);
            }
        }
        return $this->redirectToRoute('app_home_index');
    }


    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param $userType
     * @param $token
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     * @Route("/reset/{userType}/{token}")
     */
    public function resetPasswordToken(Request $request, UserPasswordEncoderInterface $encoder, $userType, $token)
    {
        $entityManager = $this->getDoctrine()->getManager();
        switch ($userType){
            case "patient":
                $repo=$entityManager->getRepository(User::class);
                break;

            case "admin":
                $repo=$entityManager->getRepository(User::class);
                break;

            case "praticien":
                $repo=$entityManager->getRepository(Praticien::class);
                break;

            case "assistant":
                $repo=$entityManager->getRepository(Assistant::class);
                break;
            default:
        }
        
        if ($token !== null) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = $repo->findOneByResetPasswordToken($token);
            $hashValidity=$user->getHashValidity();
            $datenow=new \DateTime("now");
            if($hashValidity > $datenow){
                $validity=true;
            }
            else{
                $validity=false;
            }

            if ($user !== null && $validity) {
                $form = $this->createForm(RestEmailType::class, $user);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $plainPassword = $form->getData()->getPlainPassword();
                    $encoded = $encoder->encodePassword($user, $plainPassword);
                    $user->setPassword($encoded);
                    $entityManager->persist($user);
                    $entityManager->flush();

                    switch($userType){
                        case "patient":
                            return $this->redirectToRoute('app_espacepatientfreezone_login');
                            break;

                        case "admin":
                            return $this->redirectToRoute('app_admlogin_login');
                            break;

                        case "praticien":
                            return $this->redirectToRoute('app_espacepraticienfreezone_index');
                            break;

                        case "assistant":
                            return $this->redirectToRoute('app_espaceassistant_index');
                            break;
                        default:
                    }

                }

                return $this->render('password_manager/reset_password.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
            else{
                $this->addFlash("error", "Votre code est expiré. Veuillez cliquer sur 'mot de passe oublié' du formulaire de connexion pour refaire une demande.");
            }
        }

    }

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

}
