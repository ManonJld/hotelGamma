<?php

namespace App\DataFixtures;

use App\Entity\Amenity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AmenityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cuisine = new Amenity();
        $cuisine->setName("Cuisine");
        $cuisine->setIcon("fa fa-cutlery");
        $manager->persist($cuisine);
        $this->addReference("ame-cuisine", $cuisine);

        $access = new Amenity();
        $access->setName("Accessibilité");
        $access->setIcon("fa fa-wheelchair");
        $manager->persist($access);
        $this->addReference("ame-access", $access);

        $wifi = new Amenity();
        $wifi->setName("Wifi");
        $wifi->setIcon("fa fa-wifi");
        $manager->persist($wifi);
        $this->addReference("ame-wifi", $wifi);

        $shower = new Amenity();
        $shower->setName("Douche");
        $shower->setIcon("fa fa-shower");
        $manager->persist($shower);
        $this->addReference("ame-shower", $shower);

        $cafe = new Amenity();
        $cafe->setName("Machine à café");
        $cafe->setIcon("fa fa-coffee");
        $manager->persist($cafe);
        $this->addReference("ame-cafe", $cafe);

        $manager->flush();
    }

}
