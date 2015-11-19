<?php

namespace Blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BloggerBundle:Default:index.html.twig', array('name' => $name));
    }
}
