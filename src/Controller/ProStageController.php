<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'titre' => 'Bienvenue sur la page d\'accueil de Prostages'
        ]);
    }
    /**
     * @Route("/entreprises", name="pro_stage_entreprise")
     */
    public function index_entreprise(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'titre' => 'Cette page affichera la liste des entreprises proposant un stage',
        ]);
    }
}
