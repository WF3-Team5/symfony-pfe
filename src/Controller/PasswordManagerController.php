<?php

namespace App\Controller;

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

            break;

            case "assistant":

            break;
            default:
        }

        $email=$request->request->get("fpemail");
        $verif=filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($verif) {
            $user = $repo->findOneByEmail($email);

            if ($user !== null) {
                $token= $this->genToken(120);
                $validity=$this->getTokenValidity("30");
                $message = (new Swift_Message())
                    ->setSubject('Réinitialisation de votre mot de passe')
                    ->setFrom(['wf3.team5@gmail.com' => 'Mediglob support'])
                    ->setTo([$email])
                    ->setBody('<html><head></head><body><p>Pour réinitialiser votre mot de passe veuillez cliquer sur le lien suivant:</p><p>http://localhost:8000/fotgot/password/admin/'.$token.'</p></body></html>','text/html');

                //$mailer->send($message);

                if($userType=="admin"){
                    $this->addFlash("success", "Email envoyé avec succes!");
                    $user->setHash($token);
                    $user->setHashValidity($validity);
                    $entityManager->persist($user);
                    $entityManager->flush();
                    return $this->render('admlogin/index.html.twig');
                }
                elseif($userType=="patient"){

                }
                elseif($userType=="praticien"){

                }
                elseif($userType=="assistant"){

                }
            }
        }

        return $this->redirectToRoute('home/index.html.twig', array());
    }


    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param $token
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/forgot/password/{userType}/{token}")
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

                break;

            case "assistant":

                break;
            default:
        }
        
        if ($token !== null) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneByResetPassword($token);
            if ($user !== null) {
                $form = $this->createForm(ResetType::class, $user);

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $plainPassword = $form->getData()->getPlainPassword();
                    $encoded = $encoder->encodePassword($user, $plainPassword);
                    $user->setPassword($encoded);
                    $entityManager->persist($user);
                    $entityManager->flush();

                    //add flash
                    return $this->redirectToRoute('login');
                }

                return $this->render('authentication/reset-password-token.html.twig', array(
                    'form' => $form->createView(),
                ));
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
