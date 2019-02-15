<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EspaceAssistantController extends AbstractController
{
    /**
     * @Route("/espace/assistant")
     */
    public function index()
    {
        return $this->render('espace_assistant/index.html.twig');
    }
}
