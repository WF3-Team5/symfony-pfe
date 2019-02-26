<?php

namespace App\Controller\Admin;

use App\Entity\Assistant;
use App\Entity\Praticien;
use App\Entity\Specialite;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\RuntimeException;
use Symfony\Component\Validator\Constraints\Email;

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
        $repoPraticien=$em->getRepository(Praticien::class);
        //$repoAssistant=$em->getRepository(Assistant::class);

        $usersCount=$repoUser->findTotalUserCount();
        $adminsCount=$repoUser->findTotalAdminCount();
        $praticiensCount=$repoPraticien->findTotalPraticienCount();
        //$assistantCount=$repoAssistant ->findTotalAssistantCount();
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
                            'nomRoute' => 'app_admin_dboard_list',
                            'paramsRoute' => array('usertype'=>'patient')
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
                        $praticiens=$repoPraticien->findAllMedics($page,$nbUsersParPage);
                        $emt=$this->getDoctrine()->getManager();
                        $repospe=$em->getRepository(Specialite::class);
                        $specialites=$repospe->findAll();
                        $pagination = array(
                            'page' => $page,
                            'nbPages' => ceil(count($praticiens) / $nbUsersParPage),
                            'nomRoute' => 'app_admin_dboard_list',
                            'paramsRoute' => array('userType'=>'praticien')
                        );
                        return $this->render('admin/users/list.html.twig', [
                            'specialites'=>$specialites,
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
                            'nomRoute' => 'app_admin_dboard_list',
                            'paramsRoute' => array('userType'=>'assistant')
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
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/user/edit/{id}",requirements={"id"="\d+"})
     */
    public function editUser(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/user/delete/{id}")
     */
    public function deleteUser(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param Praticien $praticien
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/praticien/details/{id}")
     */
    public function detailPraticien(Praticien $praticien)
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository(Specialite::class);
        $specialites=$repo->findBy(['praticien'=>$praticien->getId()],['libelle'=>'ASC']);
        return $this->render('admin/users/detailsPraticien.html.twig', [
            'praticien'=>$praticien,
            'specialites'=>$specialites,
        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/praticien/edit/{id}")
     */
    public function editPraticien(Praticien $praticien)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/praticien/delete/{id}")
     */
    public function deletePraticien(Praticien $praticien)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/assistant/edit/{id}")
     */
    public function editAssistant(User $user)
    {
        return $this->render('admin/users/list.html.twig', [

        ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/users/assistant/delete/{id}")
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

    /**
     * @Route("/send/mail/{userType}/{id}")
     */
    /**
     * @param $userType
     * @param $id
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendMail($userType, $id, Request $request,\Swift_Mailer $mailer)
    {
        $em=$this->getDoctrine()->getManager();
        switch($userType)
        {
            case "user":
                $repo=$em->getRepository(User::class);
            break;

            case "praticien":
                $repo=$em->getRepository(Praticien::class);
            break;

            case "assistant":
                $repo=$em->getRepository(Assistant::class);
            break;

            default:
        }

        $destinataire=$repo->findOneBy(['id'=>$id]);
        if($userType=="praticien"){
            $email=$destinataire->getEmailPro();
        }
        else{
            $email=$destinataire->getEmail();
        }

        $mail=$request->request->get("primemail");
        $cc=$request->request->get("cc");
        $subject=$request->request->get("subject");
        $msgbody=$request->request->get("msgbody");

        $err="";

        if(!empty($mail) && !$verif=filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $err="Email Destinataire non valide";
        }
        elseif(!empty($cc) && !$verif=filter_var($cc,FILTER_VALIDATE_EMAIL)){
            $err="Email CC non valide";
        }
        elseif(strlen($subject)>150){
            $err="Libéllé du Sujet Trop Long.";
        }
        if(!empty($err)){
            $this->addFlash('error',$err);
        }
        else{
            $msgbody=nl2br($msgbody);

            $message = (new Swift_Message())
                ->setSubject($subject)
                ->setFrom(['wf3.team5@gmail.com' => 'Mediglob support']);
            if(isset($mail)&& !empty($mail)) {
                $message->setTo([$mail]);
            }

            if(isset($cc)&& !empty($cc)){
                $message->setCc($cc);
            }
            $message->setBody('<html><head></head><body><p>'.$msgbody.'</p></body></html>','text/html');

            $mailer->send($message);
            $this->addFlash('success', 'email correctement envoyé');
        }

        return $this->render('admin/sendMail/sendMail.html.twig',[
            'destinataire'=>$destinataire,
            'email'=>$email,
            'cc'=>$cc,
            'subject'=>$subject,
            'msgbody'=>$msgbody,
        ]);
    }

}
