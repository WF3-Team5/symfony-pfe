<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspacePatientFreeZoneController
 * @package App\Controller
 * @Route("/espace/patient/free/zone")
 */
class EspacePatientFreeZoneController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_patient_free_zone/index.html.twig', [
            'controller_name' => 'EspacePatientFreeZoneController',
        ]);
    }

/**
* @param Request $request
* @param UserPasswordEncoderInterface $passwordEncoder
* @return \Symfony\Component\HttpFoundation\Response
* @Route("/inscription")
*/
    public function inscription(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder
    ){
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            if ($form->isValid()){
                $password = $passwordEncoder->encodePassword(
                    $user,
                    $user->getPlainPassword()
                );

                $user->setPassword($password);
                $user ->setDateInscription(date("Y-m-d"));
                $user->setStatus("patient");



                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Votre compte a bien été créé - Un Email vous permettant d\activer votre compte vous a été envoyé. Si vous ne trouvez pas ce mail, verifiez la zone spam de votre boite mail.');

                return $this->redirectToRoute(''); // AJOUTER BONNE REDIRECTION
            }
            else{
                $this->addFlash('error', 'Le formulaire d\'inscription contient des erreurs, veuillez les suivre les indications afin de finaliser votre inscription ');
            }
        }

        return $this->render(
            'espace_patient_free_zone/inscription/inscription.html.twig/index.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/connexion")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();


        if (!empty($error)){
            $this->addFlash('error', 'Vos identifiants sont incorrects');
        }

        return $this->render(
            'espace_patient_free_zone/connexion/connexion.html.twig',
            [
                'last_username' => $lastUsername
            ]
        );
    }
}
