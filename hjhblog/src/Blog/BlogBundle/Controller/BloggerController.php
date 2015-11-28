<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Form\BlogType;
/**
 * Blog controller.
 */
class BloggerController extends Controller
{
    public function userAction(){

        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $em = $this->getDoctrine()->getEntityManager();
        $blogs = $em->getRepository('BlogBundle:Blog')->getLatestBlogsFromBlogger($user->getId());

        return $this->render('BlogBundle:Blogger:user_dashboard.html.twig', array(
            "blogs"     => $blogs,
            "blogger"   => $user
        ));
    }

    public function adminAction(){
        $em = $this->getDoctrine()->getEntityManager();
        $bloggers = $em->getRepository('BloggerBundle:Blogger')->findAll();
        $blogs = $em->getRepository('BlogBundle:Blog')->findAll();
        $categories = $em->getRepository('BlogBundle:Category')->findAll();
        $comments = $em->getRepository('BlogBundle:Comment')->findAll();
        return $this->render('BlogBundle:Blogger:admin_dashboard.html.twig', array(
            "bloggers" => $bloggers,
            "blogs" => $blogs,
            "categories" => $categories,
            "comments" => $comments
        ));
    }
}