<?php

namespace Blog\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\BlogBundle\Entity\Picture;

class PictureFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $picture1 = new Picture();
        $picture1->setPath("docker-inventing-a-whole-new-industry.jpg");
        $manager->persist($picture1);

        $picture2 = new Picture();
        $picture2->setPath("drone.jpeg");
        $manager->persist($picture2);

        $picture3 = new Picture();
        $picture3->setPath("tesla.jpg");
        $manager->persist($picture3);


        $manager->flush();

        $this->addReference('picture-1', $picture1);
        $this->addReference('picture-2', $picture2);
        $this->addReference('picture-3', $picture3);
    }

    public function getOrder()
    {
        return 1;
    }

}