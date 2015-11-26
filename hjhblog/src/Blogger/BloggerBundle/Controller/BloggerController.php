<?php

namespace Blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// use Blog\BlogBundle\Form\BlogType;
use Blogger\BloggerBundle\Entity\Blogger;
/**
 * Blog controller.
 */
class BloggerController extends Controller
{
    public function profileAction($blogger_id){
        
    }

    pubic function linkToProfileAction(){
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        // the above is a shortcut for this
        $user = $this->get('security.token_storage')->getToken()->getUser();
        var_dump($user);

        return null;
    }
    
}