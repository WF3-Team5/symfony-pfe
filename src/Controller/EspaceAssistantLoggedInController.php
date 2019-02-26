<?php

namespace App\Controller;

use App\Entity\Antecedents;
use App\Entity\DossierPatient;
use App\Entity\User;
use App\Form\AntecedentsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class EspaceAssistantController
 * @package App\Controller
 * @Route("/espace/assistant/logged/in")
 */
class EspaceAssistantLoggedInController extends AbstractController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/formulaire_recherche")
     */
    public function recherchePatient(Request $request)
    {
        if ($request->query->has('numero_secu')) {
            $repository = $this->getDoctrine()->getRepository(User::class);
            $search = $repository->findOneBy([
                'numeroSecu' => $request->query->get('numero_secu')
            ]);

            if (!is_null($search)) {
                return $this->redirectToRoute('app_espaceassistantloggedin_index', ['id' => $search->getId()]);
            }
        }


        return $this->render('espace_assistant/formulaire_recherche.html.twig', []) ;
    }


    /**
     * @Route("/questionnaire_medical/{id}")
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, User $user)
    {
        $praticien=$this->getUser()->getId();
        $mgr=$this->getDoctrine()->getManager();
        $repo=$mgr->getRepository(DossierPatient::class);
        $dsUser=$repo->findOneBy(["praticien"=>$praticien, "patient"=>$user->getId()]);

        if(!is_null($dsUser)){
            return $this->redirectToRoute('app_espaceassistantloggedin_dashboard',['id'=>$user->getId()]);
        }
        $antecedents = new Antecedents();

        $form = $this->createForm(AntecedentsType::class, $antecedents);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $dsUser= new DossierPatient();

            $mgr->persist($antecedents);
            $mgr->flush();

            $numdossier=$praticien."-".$user->getId()."-".uniqid()."-".time();
            $dsUser->setNumDossier($numdossier);
            $dsUser->setPatient($user->getId());
            $dsUser->setAntecedents($antecedents->getId());
            $dsUser->setPraticien($praticien);
            $mgr->persist($dsUser);
            $mgr->flush();



            $this->addFlash('success','Les données ont bien été enregistrées !');

            return $this->redirectToRoute('app_espaceassistantloggedin_dashboard',["id"=>$user->getId()]);
        }

        return $this->render(
            'espace_assistant/index.html.twig',
            [
                'form' => $form->createView(),
                'user' => $user
            ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/dashboard/{id}", defaults={"id":null})
     */

    public function dashboard(User $user)
    {

        return $this->render('consultation/cadran 1/sommaire.html.twig',
            [
                'user'=>$user
            ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/donnees/{id}", defaults={"id":null})
     */
    public function donneesPatient(User $user)
    {
        return $this->render('consultation/cadran 1/donnees.html.twig',
            [
                'user'=>$user,

            ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/devis/{id}", defaults={"id":null})
     */
    public function devisPatient(User $user)
    {
       return $this->render('consultation/cadran 1/devis.html.twig',
           [
               'user'=>$user
           ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/mail/{id}", defaults={"id":null})
     */
    public function courrierPatient(User $user)
    {
        return $this->render('consultation/cadran 1/courrier.html.twig',
            [
                'user'=>$user
            ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * 0@Route("/rdvPatient/{id}", defaults={"id":null})
     */
    public function rdvPatient(User $user)
    {
        return $this->render('consultation/cadran 1/rdv.html.twig',
            [
                'user'=>$user
            ]);
    }

    /**
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/rdvExternePatient/{id}", defaults={"id":null})
     */
    public function rdvExternePatient(User $user)
    {
        return $this->render('consultation/cadran 1/rdvExterne.html.twig',
            [
                'user'=>$user
            ]);
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new RuntimeException('activez le firewall MAIN');
    }

}

