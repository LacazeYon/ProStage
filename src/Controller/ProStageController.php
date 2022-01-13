<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Formation;
use App\Entity\Entreprise;
use App\Entity\Stage;
use App\Repository\FormationRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\StageRepository;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="pro_stage")
     */
    public function index(StageRepository $repositoryStage): Response
    {
        
        $stages = $repositoryStage->findAll();

        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'ProStageController',
            'stages' => $stages,
        ]);
    }
    /**
     * @Route("/entreprises", name="pro_stage_entreprises")
     */
    public function index_entreprises(EntrepriseRepository $repositoryEntreprise): Response
    {
        
        $entreprises = $repositoryEntreprise->findAll();
        return $this->render('pro_stage/affichage_entreprise.html.twig', [
            'controller_name' => 'ProStageController',
            'entreprises' => $entreprises,
        ]);
    }
    /**
     * @Route("/formations", name="pro_stage_formations")
     */
    public function index_formations(FormationRepository $repositoryFormation): Response
    {
        
        $formations = $repositoryFormation->findAll();
        return $this->render('pro_stage/affichage_formation.html.twig', [
            'controller_name' => 'ProStageController',
            'formations' => $formations,
        ]);
    }
    /**
     * @Route("/stage/{id}", name="pro_stage_stage")
     */
    public function index_stage(Stage $stage): Response
    {

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
     * @Route("/stage_trierParFormation/{id}", name="pro_stage_stage_par_formation")
     */
    public function index_stage_par_formation(Formation $formation): Response
    {
        return $this->render('pro_stage/affichage_stage_par_formation.html.twig', [
            'controller_name' => 'ProStageController',
            'formation' => $formation,
        ]);
    }
    /**
     * @Route("/stage_trierParEntreprise/{id}", name="pro_stage_stage_par_entreprise")
     */
    public function index_stage_par_entreprise(Entreprise $entreprise,StageRepository $repositoryStage): Response
    {
        $stages = $repositoryStage->findBy(['entreprise' => $entreprise->getID()]);

        return $this->render('pro_stage/affichage_stage_par_entreprise.html.twig', [
            'controller_name' => 'ProStageController',
            'stages' => $stages,
            'entreprise' => $entreprise,
        ]);
    }
}
