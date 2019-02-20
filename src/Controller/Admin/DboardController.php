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
     * @param $userType
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/{userType}", defaults={"userType":null})
     */
    public function list($userType)
    {
        $em=$this->getDoctrine()->getManager();
        $users=null;
        $admins=null;
        $praticiens=null;
        $assistants=null;

        $userCount=0;
        $patientCount=0;
        $adminsCount=0;
        $praticiensCount=0;
        $assistantsCount=0;

        $repoUser=$em->getRepository(User::class);
        //$repoPraticien=$em->getRepository(Praticien::class);
        //$repoAssistant=$em->getRepository(Assistant::class);

        $usersCount=$repoUser->findTotalUserCount();
        $adminsCount=$repoUser->findTotalAdminCount();
        $patientCount=$usersCount-$adminsCount;
        $usersCount+=$praticiensCount+$assistantsCount;

        if(!is_null($userType)){
            if(in_array($userType,["patient","praticien","assistant","admin"])){
                switch($userType){
                    case "patient":
                        $users=$repoUser->findAllUsersExceptAdmins();
                        return $this->render('admin/users/list.html.twig', [
                            'users'=>$users,

                            'usersCount'=>$usersCount,
                            'patientCount'=>$patientCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;

                    case "praticien":
                        //$praticiens=$repoPraticien->findAll();
                        return $this->render('admin/users/list.html.twig', [
                            'praticiens'=>$praticiens,

                            'usersCount'=>$usersCount,
                            'patientCount'=>$patientCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;

                    case "assistant":
                        //$assistants->$repoAssistant->findAll();
                        //$repo=$em->getRepository(Assistant::class);
                        return $this->render('admin/users/list.html.twig', [
                            'assistantes'=>$assistants,

                            'patientCount'=>$patientCount,
                            'usersCount'=>$usersCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;

                    case "admin":
                        $admins=$repoUser->findAllAdmins();
                        return $this->render('admin/users/list.html.twig', [
                            'admins'=>$admins,

                            'patientCount'=>$patientCount,
                            'usersCount'=>$usersCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;
                }
            }
        }

        return $this->render('admin/users/list.html.twig', [
            'patientCount'=>$patientCount,
            'usersCount'=>$usersCount,
            'adminsCount'=>$adminsCount,
            'praticiensCount'=>$praticiensCount,
            'assistantsCount'=>$assistantsCount,
        ]);
    }

    /**
     * @param User $user
     * @param $userType
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/user/edit/{id}")
     */
    public function editUser(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @param $userType
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/user/delete/{id}")
     */
    public function deleteUser(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/praticien/edit/{id}")
     */
    public function editPraticien(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/praticien/delete/{id}")
     */
    public function deletePraticien(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/assistant/edit/{id}")
     */
    public function editAssistant(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/assistant/delete/{id}")
     */
    public function deleteAssistant(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }



}
