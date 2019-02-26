<?php

namespace App\Controller;

use App\Entity\Praticien;
use App\Form\PraticienType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class EspacePraticienFreeZoneController
 * @package App\Controller
 * @Route("/espace/praticien/free/zone")
 */
class EspacePraticienFreeZoneController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function accueil()
    {
        return $this->render('espace_praticien_free_zone/index.html.twig', [

        ]);
    }

    /**
     * @Route("/connexion")
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        dump($error);
        if (!empty($error)) {
            $this->addFlash("error", "Identifiants incorrects");
            return $this->render('espace_praticien_free_zone/index.html.twig', [
                'error' => $error,
                'lastUsername' => $lastUsername,
            ]);
        }

        return $this->render('espace_praticien_free_zone/connexion/index.html.twig', [

        ]);
    }
        /**
         * @param Request $request
         * @param UserPasswordEncoderInterface $passwordEncoder
         * @return \Symfony\Component\HttpFoundation\Response
         * @throws \Exception
         * @Route("/espace/praticien/free/zone/inscription")
         */
        public function inscription(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder
    ){
        $praticien = new Praticien();

        $form = $this->createForm(PraticienType::class, $praticien);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            if ($form->isValid()){
                $password = $passwordEncoder->encodePassword(
                    $praticien,
                    $praticien->getPlainPassword()
                );

                $praticien->setPassword($password);
                $praticien ->setDateInscription(new \DateTime());
                $praticien->setEtat("praticien");



                $em = $this->getDoctrine()->getManager();
                $em->persist($praticien);
                $em->flush();

                $this->addFlash('success', 'Votre compte a bien été créé - Un Email vous permettant d\activer votre compte vous a été envoyé. Si vous ne trouvez pas ce mail, verifiez la zone spam de votre boite mail.');

                return $this->redirectToRoute('app_espacepraticienloggedin_index'); // AJOUTER BONNE REDIRECTION
            }
            else{
                $this->addFlash('error', 'Le formulaire d\'inscription contient des erreurs, veuillez les suivre les indications afin de finaliser votre inscription ');
            }
        }

        return $this->render(
            'espace_praticien_free_zone/inscription/index.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

}
