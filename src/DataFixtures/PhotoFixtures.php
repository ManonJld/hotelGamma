<?php

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PhotoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $photoRoom11 = new Photo();
        $photoRoom11->setFilename("room1-1.jpeg");
        $photoRoom11->setAlt("Chambre standard");
        $photoRoom11->setAccomodation($this->getReference("acco-room-one"));
        $manager->persist($photoRoom11);
        $this->addReference("photoRoom1-1", $photoRoom11);


        $photoRoom21 = new Photo();
        $photoRoom21->setFilename("room2-1.jpeg");
        $photoRoom21->setAlt("Appartement standard");
        $photoRoom21->setAccomodation($this->getReference("acco-room-two"));
        $manager->persist($photoRoom21);
        $this->addReference("photoRoom2-1", $photoRoom21);

        $photoRoom22 = new Photo();
        $photoRoom22->setFilename("room2-2.jpeg");
        $photoRoom22->setAlt("Appartement standard");
        $photoRoom22->setAccomodation($this->getReference("acco-room-two"));
        $manager->persist($photoRoom22);
        $this->addReference("photoRoom2-2", $photoRoom22);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AccomodationFixtures::class
        ];
    }
}
