<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}