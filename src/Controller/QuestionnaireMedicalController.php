<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class QuestionnaireMedicalController extends AbstractController
{
    /**
     * @Route("/questionnaire/medical")
     */
    public function index()
    {
        return $this->render('questionnaire_medical/index.html.twig', []);
    }


}
