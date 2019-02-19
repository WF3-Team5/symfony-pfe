<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GroupPageController extends AbstractController
{
    /**
     * @Route("/group-page")
     */
    public function index()
    {
        return $this->render('group_page/index.html.twig');
    }
}
