<?php

namespace App\Controller;

use App\Entity\RDV;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsultationController extends AbstractController
{
    #[Route('/consultation', name: 'consultation')]
    public function index(): Response
    {

        $repository=$this->getDoctrine()->getRepository(RDV::class);
		$lesRdv=$repository->findAll();
		return $this->render('consultation/lstAvion.html.twig',['rdv' => $lesRdv,]);
        
    }
}
