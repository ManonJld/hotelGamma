<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $chambre = new Type();
        $chambre->setName("Chambre");
        $manager->persist($chambre);
        $this->addReference("type-chambre", $chambre);

        $appartement = new Type();
        $appartement ->setName("Appartement");
        $manager->persist($appartement );
        $this->addReference("type-appartement", $appartement );

        $studio = new Type();
        $studio->setName("studio");
        $manager->persist($studio);
        $this->addReference("type-studio", $studio);

        $manager->flush();
    }
}
