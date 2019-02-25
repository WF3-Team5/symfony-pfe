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
                return $this->redirectToRoute('app_espaceassistant_index', ['id' => $search->getId()]);
            }
        }



        return $this->render('espace_assistant/formulaire_recherche.html.twig', [


        ]) ;

    }


    /**
     * @Route("/questionnaire_medical/{id}")
     */
    public function index(Request $request, User $user)
    {
        $praticien=$this->getUser()->getId();
        $mgr=$this->getDoctrine()->getManager();
        $repo=$mgr->getRepository(DossierPatient::class);
        $exist=$repo->findOneBy(["praticien"=>$praticien]);

        if(!empty($exist)){
            return $this->redirectToRoute('app_espaceassistantloggedin_dashboard',['id'=>$user->getId()]);
        }
        $antecedants = new Antecedents();

        $form = $this->createForm(AntecedentsType::class, $antecedants);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $ds= new DossierPatient();
            $ds->setPatient($user->getId());
            $ds->setAntecedents($antecedants->getId());
            $ds->setPraticien($praticien);
            $em->persist($antecedants);
            $em->flush();

            $this->addFlash('success','Les données ont bien été enregistrées !');

            return $this->redirectToRoute('app_consultation_index');
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

    public function dashboard()
    {

        return $this->render('consultation/cadran 1/sommaire.html.twig',
            [
            ]);
    }


}

