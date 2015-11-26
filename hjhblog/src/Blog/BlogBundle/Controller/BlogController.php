<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Form\BlogType;
use Blog\BlogBundle\Entity\Blog;
/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id, $case = null)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('BlogBundle:Blog')->find($id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('BlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

        if($case==true){
            return $this->render('BlogBundle:Blog:number_comment.html.twig', array(
            "comments"  => $comments
        ));
        }

        return $this->render('BlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            "comments"  => $comments
        ));
    }

    public function editAction($blog_id){

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        $em = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BlogBundle:Blog')->find($blog_id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($blog->getBlogger()->getId()!=$user->getId()){
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(new BlogType(), $blog);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $blog->setUpdated(new \DateTime());
                $em->persist($blog);
                $em->flush();

                return $this->redirect($this->generateUrl('BlogBundle_blog_show', array(
                    'id' => $blog->getId()))
                );
            }
        }

        return $this->render('BlogBundle:Blog:edit.html.twig', array(
            'form' => $form->createView(),
            'blog' => $blog
    ));

    }


    public function createAction(){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        // the above is a shortcut for this
        
        $em = $this->getDoctrine()->getEntityManager();
        $blog = new Blog();

        

        $form = $this->createForm(new BlogType(), $blog);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()
                       ->getEntityManager();
                $user = $this->get('security.token_storage')->getToken()->getUser();
                $blog->setBlogger($user);
                $em->persist($blog);
                $em->flush();

                return $this->redirect($this->generateUrl('BlogBundle_homepage'));
            }
        }

        return $this->render('BlogBundle:Blog:create.html.twig', array(
            'form' => $form->createView()
    ));

    
    }


    public function removeAction($blog_id){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $em = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BlogBundle:Blog')->find($blog_id);
        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if($blog->getBlogger()->getId()!=$user->getId()){
            throw $this->createAccessDeniedException();
        }
        $em->remove($blog);
        $em->flush();
        return $this->redirect($this->generateUrl('BlogBundle_homepage'));
    }

}