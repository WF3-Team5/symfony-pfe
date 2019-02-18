<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DboardController
 * @package App\Controller
 * @Route("/dashboard")
 */
class DboardController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/")
     */
    public function index()
    {
        return $this->render('admin/widgets/index.html.twig', [

        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/{userType}", defaults={"userType":null})
     */
    public function list($userType)
    {
        $em=$this->getDoctrine()->getManager();

        if(!is_null($userType)){
            if(in_array($userType,["patient","medic","assistant"])){
                switch($userType){
                    case "patient":
                        $repo=$em->getRepository(User::class);
                        $users=$repo->findBy([],["last_name"=>"ASC"]);
                    break;

                    case "medic":
                        //$repo=$em->getRepository(Medic::class);
                    break;

                    case "assistant":
                        //$repo=$em->getRepository(Assistant::class);
                    break;
                }
            }
        }
        else{
            $users=null;
        }
        return $this->render('admin/users/list.html.twig', [
            "users"=>$users,
            "userType"=>$userType,
        ]);
    }
}
