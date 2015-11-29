<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Form\BlogType;
use Blogger\BloggerBundle\Form\BloggerType;
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
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException();
        }
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

    public function profileAction($blogger_id){
        $em = $this->getDoctrine()
                   ->getEntityManager();
        $blogger = $em->getRepository('BloggerBundle:Blogger')->find($blogger_id);
        if (!$blogger) {
            throw $this->createNotFoundException('Unable to find the Blogger, he doesn\'t exist.');
        }
        return $this->render('BlogBundle:Blogger:profile.html.twig', array(
            'blogger'    => $blogger
        ));
    }


    public function editAction($blogger_id){
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()
                   ->getEntityManager();
        $blogger = $em->getRepository('BloggerBundle:Blogger')->find($blogger_id);
        if (!$blogger) {
            throw $this->createNotFoundException('Unable to find the Blogger, he doesn\'t exist.');
        }
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            if($user->getId()!=$blogger->getId()){
                throw $this->createAccessDeniedException();
            }
        }
        $form = $this->createForm(new BloggerType(), $blogger);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em->persist($blogger);
                $em->flush();

                return $this->redirect($this->generateUrl('BlogBundle_blogger_profile', array(
                    'blogger_id' => $blogger_id))
                );
            }
        }


        return $this->render('BlogBundle:Blogger:edit.html.twig', array(
            "form" => $form->createView(),
            "blogger" => $blogger
        ));
    }

}

