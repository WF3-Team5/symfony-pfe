<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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

        return $this->render(
            'espace_patient/inscription_patient/inscription.html.twig',
            [
                'form' => $form->createView()
            ]);
    }
}
