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
        $blogger1->setUsername('system');
        $blogger1->setEmail('system@example.com');            
        $blogger1->setPlainPassword('system');
        $blogger1->setRoles(array('ROLE_ADMIN'));
        $blogger1->setEnabled(1);
        $blogger1->setSurname("admin");
        $blogger1->setFirstname("admin");
        $blogger1->setCountry("FRANCE");
        $blogger1->setAddress("Rue ZZZ");
        $blogger1->setZipcode("75000");
        $blogger1->setGender("Male");
        $blogger1->setDateOfBirth("01/01/01");
        $blogger1->addComments($manager->merge($this->getReference('comment-1')));
        $blogger1->addComments($manager->merge($this->getReference('comment-2')));
        $blogger1->addComments($manager->merge($this->getReference('comment-3')));
        $manager->persist($blogger1);

        $blogger2 = new Blogger();
        $blogger2->setUsername('client');
        $blogger2->setEmail('client1@example.com');            
        $blogger2->setPlainPassword('client');
        $blogger2->setRoles(array('ROLE_USER'));
        $blogger2->setEnabled(1);
        $blogger2->setSurname("AAA");
        $blogger2->setFirstname("BBB");
        $blogger2->setCountry("FRANCE");
        $blogger2->setAddress("Rue ZZZ");
        $blogger2->setZipcode("75000");
        $blogger2->setGender("Male");
        $blogger2->setDateOfBirth("01/01/01");
        $blogger2->addComments($manager->merge($this->getReference('comment-4')));
        $blogger2->addComments($manager->merge($this->getReference('comment-5')));
        $blogger2->addComments($manager->merge($this->getReference('comment-6')));
        $blogger2->addBlog($manager->merge($this->getReference('blog-5')));
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
        $blogger3->addComments($manager->merge($this->getReference('comment-7')));
        $blogger3->addComments($manager->merge($this->getReference('comment-8')));
        $blogger3->addComments($manager->merge($this->getReference('comment-9')));
        $blogger3->addBlog($manager->merge($this->getReference('blog-4')));
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
        $blogger4->addComments($manager->merge($this->getReference('comment-10')));
        $blogger4->addComments($manager->merge($this->getReference('comment-11')));
        $blogger4->addComments($manager->merge($this->getReference('comment-12')));
        $blogger4->addComments($manager->merge($this->getReference('comment-13')));
        $blogger4->addComments($manager->merge($this->getReference('comment-14')));
        $blogger4->addBlog($manager->merge($this->getReference('blog-1')));
        $blogger4->addBlog($manager->merge($this->getReference('blog-2')));
        $blogger4->addBlog($manager->merge($this->getReference('blog-3')));
        $manager->persist($blogger4);

        $manager->flush();


        $this->addReference('blogger-1', $blogger1);
        $this->addReference('blogger-2', $blogger2);
        $this->addReference('blogger-3', $blogger3);
        $this->addReference('blogger-4', $blogger4);

    }

    public function getOrder()
    {
        return 3;
    }

}