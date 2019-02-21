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
 * Class InscriptionPatientController
 * @package App\Controller
 * @Route("/espace/patient")
 */
class InscriptionPatientController extends AbstractController
{
    /**
     *
     *@Route("/")
     */
    public function index()
    {
        return $this->render('inscription_patient/index.html.twig');
    }

    /**
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

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Votre compte a bien été créé');

                return $this->redirectToRoute(''); // AJOUTER BONNE REDIRECTION
            }
            else{
                $this->addFlash('error', 'Le formulaire d\'inscription contient des erreurs, veuillez les suivre les indications afin de finaliser votre inscription ');
            }
        }

        return $this->render(
            'espace_patient/inscription_patient/inscription.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }



}
