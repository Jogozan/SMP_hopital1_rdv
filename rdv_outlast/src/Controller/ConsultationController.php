<?php

namespace App\Controller;

use App\Entity\RDV;
use App\Form\RdvType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ConsultationController extends AbstractController
{
    #[Route('/consultation', name: 'consultation')]
    public function index(): Response
    {

        $repository=$this->getDoctrine()->getRepository(RDV::class);
		$lesRdv=$repository->findAll();
		return $this->render('consultation/index.html.twig',['rdv' => $lesRdv,]);
        
    }
    /**
     * @Route("/ajouter/",name="ajouter")
     */
    public function ajouter(Request $request):Response{
        $em=$this->getDoctrine()->getManager();
		$rdv= new Rdv();
		$form=$this->createForm(RdvType::class,$rdv);
					
		$form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid()){
            $rdv= $form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($rdv);
            $em->flush();

            return $this->redirectToRoute('principal');
        }
		
		
        return $this->render('consultation/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/consulation/{id}",name="validation")
     */
    public function validation(Request $request): Response
    {

    $repository=$this->getDoctrine()->getRepository(Rdv::class);
    $rdv=$repository->find($id);
    $form=$this->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $rdv=$form->getData();
        $em=$this->getDoctrine()->getManager();
        $em->persist($rdv);
        $em-flush();
        return $this->redirectToRoute('consultation');
    }


    return $this->render('consultation/validation.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
