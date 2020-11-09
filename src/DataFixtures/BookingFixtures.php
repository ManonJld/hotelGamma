<?php

namespace App\DataFixtures;

use App\Entity\Booking;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Booking();
        $book1->setDateStart(new \DateTime('2020/08/22'));
        $book1->setDateEnd(new \DateTime('2020/09/09'));
        $book1->setUser($this->getReference("user-pierre"));
        $book1->setAccomodation($this->getReference("acco-room-one"));
        $manager->persist($book1);

        $book2 = new Booking();
        $book2->setDateStart(new \DateTime('2020/07/12'));
        $book2->setDateEnd(new \DateTime('2020/07/29'));
        $book2->setUser($this->getReference("user-john"));
        $book2->setAccomodation($this->getReference("acco-room-two"));
        $manager->persist($book2);

        $book3 = new Booking();
        $book3->setDateStart(new \DateTime('2020/06/02'));
        $book3->setDateEnd(new \DateTime('2020/06/25'));
        $book3->setUser($this->getReference("user-manon"));
        $book3->setAccomodation($this->getReference("acco-room-three"));
        $manager->persist($book3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AccomodationFixtures::class,
            UserFixtures::class
        ];
    }
}
