<?php

namespace App\DataFixtures;

use App\Entity\Accomodation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AccomodationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $room1 = new Accomodation();
        $room1->setPhoto("room1.jpeg");
        $room1->setBeds("1");
        $room1->setPersons("2");
        $room1->setSize("40");
        $room1->setPrice("90");
        $room1->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor erat at nisl lacinia, id tincidunt quam ornare. Proin lorem lorem, porttitor eu orci quis, tincidunt dignissim urna. Aenean pretium aliquam ex non lobortis. In hac habitasse platea dictumst. Cras enim orci, mattis eu elementum eu, cursus at velit. Maecenas ut arcu sit amet mauris tincidunt vehicula eu vitae urna. Maecenas tincidunt massa nec consectetur rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.");
        $room1->setType($this->getReference("type-chambre"));
        $room1->setCategory($this->getReference("cat-standard"));
        $room1->addAmenity($this->getReference("ame-access"));
        $room1->addAmenity($this->getReference("ame-wifi"));
        $room1->addAmenity($this->getReference("ame-shower"));
        $manager->persist($room1);
        $this->addReference("acco-room-one", $room1);

        $room2 = new Accomodation();
        $room2->setPhoto("room2.jpeg");
        $room2->setBeds("2");
        $room2->setPersons("4");
        $room2->setSize("60");
        $room2->setPrice("120");
        $room2->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor erat at nisl lacinia, id tincidunt quam ornare. Proin lorem lorem, porttitor eu orci quis, tincidunt dignissim urna. Aenean pretium aliquam ex non lobortis. In hac habitasse platea dictumst. Cras enim orci, mattis eu elementum eu, cursus at velit. Maecenas ut arcu sit amet mauris tincidunt vehicula eu vitae urna. Maecenas tincidunt massa nec consectetur rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.");
        $room2->setType($this->getReference("type-appartement"));
        $room2->setCategory($this->getReference("cat-standard"));
        $room2->addAmenity($this->getReference("ame-access"));
        $room2->addAmenity($this->getReference("ame-wifi"));
        $room2->addAmenity($this->getReference("ame-shower"));
        $room2->addAmenity($this->getReference("ame-cuisine"));
        $room2->addAmenity($this->getReference("ame-cafe"));
        $manager->persist($room2);
        $this->addReference("acco-room-two", $room2);

        $room3 = new Accomodation();
        $room3->setPhoto("room3.jpeg");
        $room3->setBeds("2");
        $room3->setPersons("4");
        $room3->setSize("65");
        $room3->setPrice("120");
        $room3->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor erat at nisl lacinia, id tincidunt quam ornare. Proin lorem lorem, porttitor eu orci quis, tincidunt dignissim urna. Aenean pretium aliquam ex non lobortis. In hac habitasse platea dictumst. Cras enim orci, mattis eu elementum eu, cursus at velit. Maecenas ut arcu sit amet mauris tincidunt vehicula eu vitae urna. Maecenas tincidunt massa nec consectetur rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.");
        $room3->setType($this->getReference("type-appartement"));
        $room3->setCategory($this->getReference("cat-standard"));
        $room3->addAmenity($this->getReference("ame-access"));
        $room3->addAmenity($this->getReference("ame-wifi"));
        $room3->addAmenity($this->getReference("ame-shower"));
        $room3->addAmenity($this->getReference("ame-cuisine"));
        $room3->addAmenity($this->getReference("ame-cafe"));
        $manager->persist($room3);
        $this->addReference("acco-room-three", $room3);

        $room4 = new Accomodation();
        $room4->setPhoto("room4.jpeg");
        $room4->setBeds("1");
        $room4->setPersons("2");
        $room4->setSize("33");
        $room4->setPrice("80");
        $room4->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor erat at nisl lacinia, id tincidunt quam ornare. Proin lorem lorem, porttitor eu orci quis, tincidunt dignissim urna. Aenean pretium aliquam ex non lobortis. In hac habitasse platea dictumst. Cras enim orci, mattis eu elementum eu, cursus at velit. Maecenas ut arcu sit amet mauris tincidunt vehicula eu vitae urna. Maecenas tincidunt massa nec consectetur rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.");
        $room4->setType($this->getReference("type-chambre"));
        $room4->setCategory($this->getReference("cat-standard"));
        $room4->addAmenity($this->getReference("ame-access"));
        $room4->addAmenity($this->getReference("ame-wifi"));
        $room4->addAmenity($this->getReference("ame-shower"));
        $manager->persist($room4);
        $this->addReference("acco-room-four",$room4);

        $room5 = new Accomodation();
        $room5->setPhoto("room5.jpeg");
        $room5->setBeds("1");
        $room5->setPersons("2");
        $room5->setSize("50");
        $room5->setPrice("110");
        $room5->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tempor erat at nisl lacinia, id tincidunt quam ornare. Proin lorem lorem, porttitor eu orci quis, tincidunt dignissim urna. Aenean pretium aliquam ex non lobortis. In hac habitasse platea dictumst. Cras enim orci, mattis eu elementum eu, cursus at velit. Maecenas ut arcu sit amet mauris tincidunt vehicula eu vitae urna. Maecenas tincidunt massa nec consectetur rutrum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.");
        $room5->setType($this->getReference("type-chambre"));
        $room5->setCategory($this->getReference("cat-superieur"));
        $room5->addAmenity($this->getReference("ame-access"));
        $room5->addAmenity($this->getReference("ame-wifi"));
        $room5->addAmenity($this->getReference("ame-shower"));
        $room5->addAmenity($this->getReference("ame-cafe"));
        $manager->persist($room5);
        $this->addReference("acco-room-five", $room5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TypeFixtures::class,
            CategoryFixtures::class,
            AmenityFixtures::class
        ];
    }
}
