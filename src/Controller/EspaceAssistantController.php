<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index()
    {
        return $this->render('espace_assistant/index.html.twig', []);
    }
}
