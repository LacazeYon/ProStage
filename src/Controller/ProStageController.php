<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Repository\RepositoryFormation;
use App\Repository\RepositoryEntreprise;
use App\Repository\RepositoryStage;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stages = $repositoryStage->findAll();

        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'stages' => $stages,
        ]);
    }
    /**
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function index_entreprises(): Response
    {
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprises = $repositoryEntreprise->findAll();
        return $this->render('pro_stage/affichage_entreprise.html.twig', [
            'controller_name' => 'ProStageController',
            'entreprises' => $entreprises,
        ]);
    }
    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function index_formations(): Response
    {
        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formations = $repositoryFormation->findAll();
        return $this->render('pro_stage/affichage_formation.html.twig', [
            'controller_name' => 'ProStageController',
            'formations' => $formations,
        ]);
    }
    /**
     * @Route("/stage/{id}", name="pro_stage_stage")
     */
    public function index_stage($id): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stage = $repositoryStage->find($id);

        return $this->render('pro_stage/affichage_stage_id.html.twig', [
            'controller_name' => 'ProStageController',
            'stage' => $stage,
        ]);
    }
    /**
     * @Route("/filtrer", name="pro_stage_filtrer")
     */
    public function index_filtrer(): Response
    {
        return $this->render('pro_stage/filtrer.html.twig', [
            'controller_name' => 'ProStageController',
        ]);
    }
    /**
     * @Route("/stage_trierParFormation/{idFormation}", name="pro_stage_stage_par_formation")
     */
    public function index_stage_par_formation($idFormation): Response
    {

        $repositoryFormation = $this->getDoctrine()->getRepository(Formation::class);
        $formation = $repositoryFormation->find($idFormation);
        

        return $this->render('pro_stage/affichage_stage_par_formation.html.twig', [
            'controller_name' => 'ProStageController',
            'formation' => $formation,
        ]);
    }
    /**
     * @Route("/stage_trierParEntreprise/{idEntreprise}", name="pro_stage_stage_par_entreprise")
     */
    public function index_stage_par_entreprise($idEntreprise): Response
    {
        $repositoryStage = $this->getDoctrine()->getRepository(Stage::class);
        $stages = $repositoryStage->findBy(['entreprise' => $idEntreprise]);
        
        $repositoryEntreprise = $this->getDoctrine()->getRepository(Entreprise::class);
        $entreprise = $repositoryEntreprise->find($idEntreprise);

        return $this->render('pro_stage/affichage_stage_par_entreprise.html.twig', [
            'controller_name' => 'ProStageController',
            'stages' => $stages,
            'entreprise' => $entreprise,
        ]);
    }
}
