<?php

namespace App\Controller;

use App\Entity\Antecedents;
use App\Entity\User;
use App\Form\AntecedentsType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EspaceAssistantController
 * @package App\Controller
 * @Route("/espace")
 */
class EspaceAssistantController extends AbstractController
{
    /**
     * @Route("/assistant")
     */
    public function index(Request $request)
    {
        $antecedants = new Antecedents();

        $form = $this->createForm(AntecedentsType::class, $antecedants);

        $form->handleRequest($request);


        return $this->render(
            'espace_assistant/index.html.twig',
            [
                'form' => $form->createView(),
            ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/formulaire_recherche")
     */
    public function recherchePatient(User $user)
    {
        $em  = $this->getDoctrine()->getManager();
        $user = New User();
        $user = $em->findBy(
            ['last_name' =>$lastName]
        );

        $form =$this->createForm(UserType::class, $user);
        $form->handleRequest();

        return $this->render(
            'formulaire_recherche.html.twig',
            [
                'form' => $form->createView(),
                'last_name' => $lastName
            ]);
    }

}
