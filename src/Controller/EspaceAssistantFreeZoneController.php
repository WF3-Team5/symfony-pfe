<?php

namespace App\Controller;

use App\Entity\Assistant;
use App\Entity\Praticien;
use App\Entity\ValiditeInscription;
use App\Form\AssistantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspaceAssistantFreeZoneController
 * @package App\Controller
 * @Route("/espace/assistant/free/zone")
 */
class EspaceAssistantFreeZoneController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('espace_assistant_free_zone/index.html.twig', []);
    }

    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/connexion")
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils )
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        if (!empty($error)){
            $this->addFlash('error', 'Vos identifiants sont incorrects');
        }

        return $this->render('espace_assistant_free_zone/connexion.html.twig',
            [
                'last_username'=>$lastUsername

            ]);
    }

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param Praticien $praticien
     * @param $token
     * @throws \Exception
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/assistant/inscription/{id}/{token}")
     */

    public function inscription(Request $request, UserPasswordEncoderInterface $encoder, Praticien $praticien, $token)
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository(ValiditeInscription::class);
        $validite=$repo->findOneBy(['praticien'=>$praticien->getId(), 'hash'=>$token]);

        $assistant = new Assistant();

        if(!is_null($validite)){
            $hashValidity=$validite->getHashValidity();
            $datenow=new \DateTime("now");

            if($hashValidity > $datenow){
                $validity=true;
            }
            else{
                $validity=false;
            }

            $form = $this->createForm(AssistantType::class, $assistant);
            $form->handleRequest($request);

            if($validity){
                if ($form->isSubmitted()) {
                    if ($form->isValid()) {
                        $password = $encoder->encodePassword(
                            $assistant,
                            $assistant->getPlainPassword()
                        );

                        $assistant->setPassword($password);
                        $assistant->setDateInscription(new \DateTime());
                        $assistant->setPraticien($praticien->getId());
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($assistant);
                        $em->flush();

                        $this->redirectToRoute('app_espaceassistantloggedin_recherchepatient');
                    }
                    else{
                        $this->addFlash('error', 'Le formulaire d\'inscription contient des erreurs, veuillez les suivre les indications afin de finaliser votre inscription ');
                    }
                }
            }
            else{
                return $this->redirectToRoute('app_home_index');
            }
        }

        return $this->render(
            '/espace_assistant_free_zone/inscription.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
