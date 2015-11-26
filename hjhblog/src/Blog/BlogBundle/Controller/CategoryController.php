<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Form\BlogType;
use Blog\BlogBundle\Entity\Blog;
/**
 * Blog controller.
 */
class CategoryController extends Controller
{
    public function showCategoriesAction(){
        $em = $this->getDoctrine()->getEntityManager();

        $categories = $em->getRepository('BlogBundle:Category')->findAll();
        // $blogs = $em->getRepository('BlogBundle:Blog')->getBlogsFromString($_GET["search"]);

        return $this->render('BlogBundle:Category:show_categories.html.twig', array(
            'categories'      => $categories
        ));
    }

    public function blogsByCategoryAction($category_id){
        $em = $this->getDoctrine()->getEntityManager();

        $category = $em->getRepository('BlogBundle:Category')->find($category_id);

        return $this->render('BlogBundle:Search:result.html.twig', array(
            'blogs'      => $category->getBlogs()
        ));
    }
}