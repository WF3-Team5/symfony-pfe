<?php

namespace App\Controller;

use App\Entity\Antecedents;
use App\Form\AntecedentsType;
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

}
