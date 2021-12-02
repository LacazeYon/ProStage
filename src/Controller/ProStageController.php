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
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function index_entreprises(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'titre' => 'Cette page affichera la liste des entreprises proposant un stage',
        ]);
    }
    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function index_formations(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'titre' => 'Cette page affichera la liste des formations de l\'IUT',
        ]);
    }
    /**
     * @Route("/stage/{id}", name="pro_stage_stage")
     */
    public function index_stage($id): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'titre' => 'Cette page affichera le descriptif du stage ayant pour identifiant ' . $id,
        ]);
    }
}
