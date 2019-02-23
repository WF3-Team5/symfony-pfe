<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\RuntimeException;
/**
 * Class DboardController
 * @package App\Controller
 * @Route("/dashboard")
 */
class DboardController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        $user=$this->getUser();
        if(is_null($user)){
            return $this->redirectToRoute("app_admlogin_login");
        }

        return $this->render('admin/widgets/index.html.twig', [

        ]);
    }

    /**
     * @param string $userType
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/{userType}/{page}", defaults={"userType":null,"page":null}, requirements={"page"="\d+"})
     */
    public function list($userType,$page)
    {

        $em=$this->getDoctrine()->getManager();
        $patients=array();
        $admins=array();
        $praticiens=array();
        $assistants=array();

        $usersCount=0;
        $patientCount=0;
        $adminsCount=0;
        $praticiensCount=0;
        $assistantsCount=0;
        $nbUsersParPage=20;

        $repoUser=$em->getRepository(User::class);
        //$repoPraticien=$em->getRepository(Praticien::class);
        //$repoAssistant=$em->getRepository(Assistant::class);

        $usersCount=$repoUser->findTotalUserCount();
        $adminsCount=$repoUser->findTotalAdminCount();
        $patientCount=$usersCount-$adminsCount;
        $usersCount+=$praticiensCount+$assistantsCount;



        if(!is_null($userType) && !is_null($page)){
            if(in_array($userType,["patient","praticien","assistant","admin"])){
                switch($userType){
                    case "patient":
                        $patients=$repoUser->findAllUsersExceptAdmins($page,$nbUsersParPage);
                        $pagination = array(
                            'page' => $page,
                            'nbPages' => ceil(count($patients) / $nbUsersParPage),
                            'nomRoute' => '/users/patient/',
                            'paramsRoute' => array()
                        );
                        return $this->render('admin/users/list.html.twig', [
                            'patients'=>$patients,
                            'pagination'=>$pagination,

                            'usersCount'=>$usersCount,
                            'patientCount'=>$patientCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;

                    case "praticien":
                        //$praticiens=$repoPraticien->findAllMedics($page,$nbUserParPage);
                        $pagination = array(
                            'page' => $page,
                            'nbPages' => ceil(count($praticiens) / $nbUsersParPage),
                            'nomRoute' => '/users/praticien/',
                            'paramsRoute' => array()
                        );
                        return $this->render('admin/users/list.html.twig', [
                            'praticiens'=>$praticiens,
                            'pagination'=>$pagination,
                            'usersCount'=>$usersCount,
                            'patientCount'=>$patientCount,
                            'adminsCount'=>$adminsCount,
                            'praticiensCount'=>$praticiensCount,
                            'assistantsCount'=>$assistantsCount,
                        ]);
                    break;

                    case "assistant":
                        //$assistants=$repoAssistant->findAllAsst($page,$nbUserParPage);
                        $pagination = array(
                            'page' => $page,
                            'nbPages' => ceil(count($assistants) / $nbUsersParPage),
                            'nomRoute' => '/users/assistant/',
                            'paramsRoute' => array()
                        );
                        return $this->render('admin/users/list.html.twig', [
                            'assistants'=>$assistants,
                            'pagination'=>$pagination,
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
     * @Route("/users/user/details/{id}",requirements={"id"="\d+"})
     */
    public function showUser(User $user)
    {
        return $this->render('admin/users/details.html.twig', [
            'user'=>$user,
        ]);
    }

    /**
     * @param User $user
     * @param $userType
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("users/user/edit/{id}",requirements={"id"="\d+"})
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

    /**
     * @Route("/logout")
     */
    public function logout()
    {

        throw new RuntimeException('You must activate the logout in your security firewall configuration.');
    }

}
