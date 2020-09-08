<?php

namespace App\DataFixtures;

use App\Entity\Variete;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 27; $i++) { 
        
            $variete = new Variete();
            $variete->setNom("nom de la graine n= $i")
                    ->setDescription("Ceci est une description")
                    ->setImage("image")
                    ->setLotIndicatif("nom de la graine")
                    ->setSlug("nom-de-la-graine-$i");

        
            $manager->persist($variete);
                
        }
        $manager->flush();
    }
}
