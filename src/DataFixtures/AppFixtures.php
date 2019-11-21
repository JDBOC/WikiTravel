<?php

namespace App\DataFixtures;

use App\Entity\Etapes;
use App\Entity\Voyage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $faker = Factory::create ( 'FR-fr' );
      //Fixtures Voyages
        for ($i=0; $i <= 10; $i++) {
          $voyage = new Voyage();

          $voyage ->setTitre ("Titre du voyage n° $i")
                  ->setLieu ($faker->country)
                  ->setDescription ($faker->paragraph)
                  ->setMap ("http://evasion-online.com/imagearticle/2015/09/carte-du-monde-pays-anglais-660x330.jpg")
                  ->setDebut ($faker->dateTimeBetween ('-10 years'))
                  ->setRetour ($faker->dateTimeBetween ('now'));

        $manager->persist ($voyage);

          //Fixtures Etapes
          $nbEtapes = random_int (3, 10);
          for($j=0; $j<=$nbEtapes; $j++) {
            $etape = new Etapes();


            $etape -> setVoyage ($voyage)
              ->setTitre ($faker->title)
              ->setDescription ($faker->paragraph)
              ->setDate ($faker->dateTimeBetween ($voyage->getDebut (), ($voyage->getRetour ())))
              ->setAuteur ($faker->name ());
            $manager->persist($etape);
        }


      }


        $manager->flush();

    }
}
