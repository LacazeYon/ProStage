<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Entreprise;
use App\Entity\Formation;
use App\Entity\Stage;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        // Création des formations proposées sur prostages
        $dutInfo = new Formation();
        $dutInfo->setNomCourt("DUT Info");
        $dutInfo->setNomLong("Diplôme Universitaire Technologique Informatique");

        $dutGim = new Formation();
        $dutGim->setNomCourt("DUT Gim");
        $dutGim->setNomLong("Diplôme Universitaire Technologique Génie Industriel et Maintenance");

        $dutCJ = new Formation();
        $dutCJ->setNomCourt("DUT CJ");
        $dutCJ->setNomLong("Diplôme Universitaire Technologique Carrière Juridique");

        $dutGC = new Formation();
        $dutGC->setNomCourt("DUT GC");
        $dutGC->setNomLong("Diplôme Universitaire Technologique Génie Civil");

        $tableauFormations = array($dutInfo, $dutGim, $dutCJ, $dutGC);

        foreach($tableauFormations as $formation){
            $manager->persist($formation);
        }

        //Création des entreprises proposées sur prostages

        //Génération aléatoire du nombre d'entreprise entre 20 et 30
        $nbEntreprises = $faker->numberBetween(20, 30);

        for($i = 0; $i < $nbEntreprises; $i++){
            $entreprise = new Entreprise();
            $entreprise->setNom($faker->company()); //Génère un nom aléatoire d'une entreprise
            $entreprise->setAdresse($faker->address()); //Génère une adresse aléatoire
            $entreprise->setActivite($faker->catchPhrase()); //Génère un texte chelou, à voir si c'est correct
            $entreprise->setSiteweb($faker->url()); //Génère une url random
            
            //Maintenant je vais venir créer un nombre aléatoire de stage pour l'entreprise que je suis entrain de créer
            $nbStages = $faker->numberBetween(1,6);

            for($j = 0; $j < $nbStages; $j++){
                $stage = new Stage();
                $stage->setTitre($faker->jobTitle()); //Génère un nom de métier aléatoire
                $stage->setMission($faker->realTextBetween(120,250)); //Génère un texte entre 120 et 250 caractères
                $stage->setEmail($faker->companyEmail()); //Génère une adresse mail pro aléatoire
                $stage->setEntreprise($entreprise); //Je spécifie l'entreprise de mon stage grace a l'entité actuelle, car je rapelle qu'on se trouve dans la boucle de la création d'entreprise aussi

                //Maintenant je vais venir associé des formations à mon stage avant de venir le "persist"
                //Je vais générer un nombre aléatoire entre 1 et mon nombre de formation pour savoir à combien de formation sera lié mon stage
                $nbFormationPourunStage = $faker->numberBetween(1,4);
                for($k = 0; $k < $nbFormationPourunStage; $k++){
                    //Une fois ce nombre généré je viens maintenant associer à mon stage les formations, pour cela je viens generer un nombre aléatoire unique (dans le sens different des tirages précédent) qui va me servir pour choisir dans mon tableau de formation
                    $nbIndiceFormation = $faker->unique()->numberBetween(0,3); //(0,3) Car le tableau est de taille 4
                    $stage->addFormation($tableauFormations[$nbIndiceFormation]);
                }

                $manager->persist($stage);
                $faker->unique(true); // Reset le unique pour qu'il supprime les valeurs qu'il avait  enregistré
            }

            $manager->persist($entreprise);
            
        }


        $manager->flush();
    }
}
