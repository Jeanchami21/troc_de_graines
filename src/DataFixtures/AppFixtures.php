<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Variete;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');
      

        for ($i = 1; $i <= 126; $i++) { 
            $variete = new Variete();

            $nom = $faker->sentence(4);
            $image = $faker->imageUrl(100,100);
            $description = $faker->paragraph(2);
            


            $variete->setNom($nom)
                    ->setDescription($description)
                    ->setImage($image)
                    ->setLotIndicatif(mt_rand(40, 200));
                   
           
        
            $manager->persist($variete);
                
        }
        $manager->flush();
    }
}
