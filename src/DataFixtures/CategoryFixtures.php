<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $standard = new Category();
        $standard->setName("Standard");
        $manager->persist($standard);
        $this->addReference("cat-standard", $standard);

        $superieur = new Category();
        $superieur->setName("Supérieur");
        $manager->persist($superieur);
        $this->addReference("cat-superieur", $superieur);

        $manager->flush();
    }
}
