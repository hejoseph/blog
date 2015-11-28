<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/CommentFixtures.php

namespace Blog\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\BlogBundle\Entity\Comment;
use Blog\BlogBundle\Entity\Blog;

class CommentFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setUser('symfony');
        $comment->setComment('To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.');
        // $comment->setBlog($manager->merge($this->getReference('blog-1')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-1', $comment);

        $comment = new Comment();
        $comment->setUser('David');
        $comment->setComment('To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!');
        // $comment->setBlog($manager->merge($this->getReference('blog-1')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-2', $comment);

        $comment = new Comment();
        $comment->setUser('Dade');
        $comment->setComment('Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-3', $comment);

        $comment = new Comment();
        $comment->setUser('Kate');
        $comment->setComment('Are you challenging me? ');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:15:20"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-4', $comment);

        $comment = new Comment();
        $comment->setUser('Dade');
        $comment->setComment('Name your stakes.');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:18:35"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-5', $comment);

        $comment = new Comment();
        $comment->setUser('Kate');
        $comment->setComment('If I win, you become my slave.');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:22:53"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-6', $comment);

        $comment = new Comment();
        $comment->setUser('Dade');
        $comment->setComment('Your SLAVE?');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:25:15"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-7', $comment);
        
        $comment = new Comment();
        $comment->setUser('Kate');
        $comment->setComment('You wish! You\'ll do shitwork, scan, crack copyrights...');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 06:46:08"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-8', $comment);
        
        $comment = new Comment();
        $comment->setUser('Dade');
        $comment->setComment('And if I win?');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 10:22:46"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-9', $comment);
        
        $comment = new Comment();
        $comment->setUser('Kate');
        $comment->setComment('Make it my first-born!');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-23 11:08:08"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-10', $comment);
        
        $comment = new Comment();
        $comment->setUser('Dade');
        $comment->setComment('Make it our first-date!');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-24 18:56:01"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-11', $comment);
        
        $comment = new Comment();
        $comment->setUser('Kate');
        $comment->setComment('I don\'t DO dates. But I don\'t lose either, so you\'re on!');
        // $comment->setBlog($manager->merge($this->getReference('blog-2')));
        $comment->setCreated(new \DateTime("2011-07-25 22:28:42"));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-12', $comment);
        
        $comment = new Comment();
        $comment->setUser('Stanley');
        $comment->setComment('It\'s not gonna end like this.');
        // $comment->setBlog($manager->merge($this->getReference('blog-3')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-2')));
        $manager->persist($comment);
        $this->addReference('comment-13', $comment);
        
        $comment = new Comment();
        $comment->setUser('Gabriel');
        $comment->setComment('Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.');
        // $comment->setBlog($manager->merge($this->getReference('blog-3')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-4')));
        $manager->persist($comment);
        $this->addReference('comment-14', $comment);
        
        $comment = new Comment();
        $comment->setUser('Mile');
        $comment->setComment('Doesn\'t Bill Gates have something like that?');
        // $comment->setBlog($manager->merge($this->getReference('blog-5')));
        // $comment->setBlogger($manager->merge($this->getReference('blogger-3')));
        $manager->persist($comment);
        $this->addReference('comment-15', $comment);
        
        $comment = new Comment();
        $comment->setUser('Gary');
        $comment->setComment('Bill Who?');
        // $comment->setBlog($manager->merge($this->getReference('blog-5')));
        $manager->persist($comment);
        $this->addReference('comment-16', $comment);
        
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}