<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspacePatientFreeZoneController
 * @package App\Controller
 * @Route("/espace/patient/free/zone")
 */
class EspacePatientFreeZoneController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_patient_free_zone/index.html.twig', [
            'controller_name' => 'EspacePatientFreeZoneController',
        ]);
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/inscription")
     */
    public function inscription(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        Swift_Mailer $mailer
    ){
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            if ($form->isValid()){
                $password = $passwordEncoder->encodePassword(
                    $user,
                    $user->getPlainPassword()
                );

                $user->setPassword($password);
                $user ->setDateInscription(date("Y-m-d"));
                $user->setStatus("patient");



                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $repo=$em->getRepository(User::class);
                $newUser=$repo->findOneBy(["email"=>$user->getEmail()]);

                $message = (new Swift_Message())
                    ->setSubject('MediGlob - Activation de votre compte')
                    ->setFrom(['wf3.team5@gmail.com' => 'Mediglob support'])
                    ->setTo([$newUser->getEmail()])
                    ->setBody('<html><head></head><body><p>Bienvenue chez MediGlob!<br>Pour activer votre compte veuillez cliquer sur le lien suivant:</p><p>http://localhost:8000/espace/patient/free/zone/account/activation/'.$newUser->getId().'</p><p><br><br>L\'équipe MediGlob.</p></body></html>','text/html');

                $mailer->send($message);

                $this->addFlash('success', 'Votre compte a bien été créé - Un Email vous permettant d\'activer votre compte vous a été envoyé. Si vous ne trouvez pas ce mail, verifiez la zone spam de votre boite mail.');

                return $this->redirectToRoute('app_espacepatientfreezone_activationsent'); // AJOUTER BONNE REDIRECTION
            }
            else{
                $this->addFlash('error', 'Le formulaire d\'inscription contient des erreurs, veuillez les suivre les indications afin de finaliser votre inscription ');
            }
        }

        return $this->render(
            'espace_patient_free_zone/inscription/inscription.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/activation/sent")
     */
    public function activationSent()
    {
        return $this->render(
            'espace_patient_free_zone/activation/sent.html.twig',
            [

            ]
        );
    }

    /**
     * @Route("/account/activation/{id}", requirements={"id"="\d+"})
     */
    public function accountActivation(User $user)
    {
        $em=$this->getDoctrine()->getManager();
        $etat=$user->getEtat();
        if($etat=="attente"){
            $user->setEtat("active");
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_espacepatientfreezone_activationconfimation');
        }
        return $this->redirectToRoute('app_home_index');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/activation/confirmation")
     */
    public function activationConfimation()
    {
        return $this->render(
            'espace_patient_free_zone/activation/confirmed.html.twig',
            [

            ]
        );
    }

    /**
     * @Route("/connexion")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();


        if (!empty($error)){
            $this->addFlash('error', 'Vos identifiants sont incorrects');
        }

        return $this->render(
            'espace_patient_free_zone/connexion/connexion.html.twig',
            [
                'last_username' => $lastUsername
            ]
        );
    }
}
