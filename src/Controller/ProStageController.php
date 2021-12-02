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
        ]);
    }
    /**
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function index_entreprises(): Response
    {
        return $this->render('pro_stage/affichage_entreprise.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function index_formations(): Response
    {
        return $this->render('pro_stage/affichage_formation.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/stage/{id}", name="pro_stage_stage")
     */
    public function index_stage($id): Response
    {
        return $this->render('pro_stage/affichage_stage_id.html.twig', [
            'controller_name' => 'ProStageController',
            'id' => $id,
        ]);
    }
}
