<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Blog\BlogBundle\Entity\Search;
use Blog\BlogBundle\Form\SearchType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $blogs = $em->getRepository('BlogBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('BlogBundle:Page:index.html.twig', array(
            'blogs' => $blogs
        ));
    }

    public function aboutAction(){
    	return $this->render("BlogBundle:Page:about.html.twig");
    }


    public function sidebarAction(){
        $em = $this->getDoctrine()
                   ->getEntityManager();
                   
        $blogs = $em->getRepository('BlogBundle:Blog')
                   ->getBlogsMorePopularity();


        return $this->render('BlogBundle:Page:sidebar.html.twig', array(
            'blogs'    => $blogs
        ));
    }

    public function bloggerBlogsAction($blogger_id){
        $em = $this->getDoctrine()
                   ->getEntityManager();
        $blogger = $em->getRepository('BloggerBundle:Blogger')->find($blogger_id);
        if (!$blogger) {
            throw $this->createNotFoundException('Unable to find the Blogger, he doesn\'t exist.');
        }

        $blogs = $em->getRepository('BlogBundle:Blog')
                   ->getLatestBlogsFromBlogger($blogger->getId());

        return $this->render('BlogBundle:Blogger:show_blogger_blogs.html.twig', array(
            'blogger'  => $blogger,
            'blogs'    => $blogs
        ));
    }


    public function searchAction(){
        $em = $this->getDoctrine()
                   ->getEntityManager();
        $blogs = $em->getRepository('BlogBundle:Blog')->getBlogsFromString($_GET["search"]);
        // $blogger = $em->getRepository('BloggerBundle:Blogger')->findOneBySurname("admin");
        // $blogger->addBlog($blogs);
        // $blogs->setBlogger($blogger);
        return $this->render('BlogBundle:Search:result.html.twig', array(
            "blogs" => $blogs,
            "get_search" => $_GET["search"]
        ));

    }


    public function bloggerDashboardAction($blogger_id){
        $em = $this->getDoctrine()
                   ->getEntityManager();
        $blogger = $em->getRepository('BloggerBundle:Blogger')->find($blogger_id);
        if (!$blogger) {
            throw $this->createNotFoundException('Unable to find the Blogger, he doesn\'t exist.');
        }

        $blogs = $em->getRepository('BlogBundle:Blog')
                   ->getLatestBlogsFromBlogger($blogger->getId());

        return $this->render('BlogBundle:Blogger:profile.html.twig', array(
            'blogs'    => $blogs
        ));
    }

}