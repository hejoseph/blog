<?php
// src/Blogger/BlogBundle/Controller/PageController.php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Entity\Enquiry;
use Blog\BlogBundle\Form\EnquiryType;

class PageController extends Controller
{
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


    public function contactAction(){
    	$enquiry = new Enquiry();
	    $form = $this->createForm(new EnquiryType(), $enquiry);

	    $request = $this->getRequest();
	    if ($request->getMethod() == 'POST') {
	        $form->bind($request);

	        if ($form->isValid()) {
	            // Perform some action, such as sending an email

	            // Redirect - This is important to prevent users re-posting
	            // the form if they refresh the page
	            return $this->redirect($this->generateUrl('BloggerBlogBundle_contact'));
	        }
	    }

	    return $this->render('BlogBundle:Page:contact.html.twig', array(
	        'form' => $form->createView()
    ));
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

}