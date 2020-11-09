<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $pierre = new User();
        $pierre->setEmail("pierre.jehan@gmail.com");
        $pierre->setFirstName("Pierre");
        $pierre->setLastName("Jehan");
        $pierre->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($pierre, "pjehan");
        $pierre->setPassword($password);
        $manager->persist($pierre);
        $this->addReference("user-pierre", $pierre);

        $john = new User();
        $john->setEmail("john@doe.com");
        $john->setFirstName("John");
        $john->setLastName("Doe");
        $password = $this->encoder->encodePassword($john, "jdoe");
        $john->setPassword($password);
        $manager->persist($john);
        $this->addReference("user-john", $john);

        $manon = new User();
        $manon->setEmail("manon.jeuland@gmail.com");
        $manon->setFirstName("Manon");
        $manon->setLastName("Jeuland");
        $password = $this->encoder->encodePassword($manon, "mjeuland");
        $manon->setPassword($password);
        $manager->persist($manon);
        $this->addReference("user-manon", $manon);

        $manager->flush();
    }
}
