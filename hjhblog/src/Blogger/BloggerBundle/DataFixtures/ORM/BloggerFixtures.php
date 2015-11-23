<?php

namespace Blogger\BloggerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Blogger\BloggerBundle\Entity\Blogger;

class BloggerFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $i = 1;

    private $container;
    
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $blogger1 = new Blogger();
        $blogger1->setUsername('System');
        $blogger1->setEmail('system@example.com');            
        $blogger1->setPlainPassword('aze');
        $blogger1->setRoles(array('ROLE_SUPER_ADMIN'));
        $blogger1->setEnabled(1);
        $blogger1->setSurname("admin");
        $blogger1->setFirstname("admin");
        $blogger1->setCountry("FRANCE");
        $blogger1->setAddress("Rue ZZZ");
        $blogger1->setZipcode("75000");
        $blogger1->setGender("Male");
        $blogger1->setDateOfBirth("01/01/01");
        $manager->persist($blogger1);

        $blogger2 = new Blogger();
        $blogger2->setUsername('client1');
        $blogger2->setEmail('client1@example.com');            
        $blogger2->setPlainPassword('aze');
        $blogger2->setRoles(array('ROLE_USER'));
        $blogger2->setEnabled(1);
        $blogger2->setSurname("AAA");
        $blogger2->setFirstname("BBB");
        $blogger2->setCountry("FRANCE");
        $blogger2->setAddress("Rue ZZZ");
        $blogger2->setZipcode("75000");
        $blogger2->setGender("Male");
        $blogger2->setDateOfBirth("01/01/01");
        $manager->persist($blogger2);

        $blogger3 = new Blogger();
        $blogger3->setUsername('client2');
        $blogger3->setEmail('client2@example.com');            
        $blogger3->setPlainPassword('aze');
        $blogger3->setRoles(array('ROLE_USER'));
        $blogger3->setEnabled(1);
        $blogger3->setSurname("AAA");
        $blogger3->setFirstname("BBB");
        $blogger3->setCountry("FRANCE");
        $blogger3->setAddress("Rue ZZZ");
        $blogger3->setZipcode("75000");
        $blogger3->setGender("Male");
        $blogger3->setDateOfBirth("01/01/01");
        $manager->persist($blogger3);

        $blogger4 = new Blogger();
        $blogger4->setUsername('joseph');
        $blogger4->setEmail('joseph@example.com');            
        $blogger4->setPlainPassword('aze');
        $blogger4->setRoles(array('ROLE_ADMIN'));
        $blogger4->setEnabled(1);
        $blogger4->setSurname("He");
        $blogger4->setFirstname("Joseph");
        $blogger4->setCountry("FRANCE");
        $blogger4->setAddress("Rue ZZZ");
        $blogger4->setZipcode("75000");
        $blogger4->setGender("Male");
        $blogger4->setDateOfBirth("01/01/01");
        $manager->persist($blogger4);

        $manager->flush();


        $this->addReference('blogger-1', $blogger1);
        $this->addReference('blogger-2', $blogger2);
        $this->addReference('blogger-3', $blogger3);
        $this->addReference('blogger-4', $blogger4);

    }

    public function getOrder()
    {
        return 1;
    }

}