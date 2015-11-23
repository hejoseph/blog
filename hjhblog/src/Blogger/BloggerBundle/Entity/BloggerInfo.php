<?php
// src/Acme/UserBundle/Entity/User.php

namespace Blogger\BloggerBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="bloggerinfo")
 * @ORM\Entity(repositoryClass="Blogger\BloggerBundle\Repository\BloggerInfoRepository")
 */
class BloggerInfo
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\ManytoOne(targetEntity="Blogger\BloggerBundle\Entity\Blogger", inversedBy="info",cascade={"persist"})
    * @ORM\JoinColumn(nullable=true, name="blogger_id",  referencedColumnName="id")
    */
    private $blogger;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set blogger
     *
     * @param \Blogger\BloggerBundle\Entity\Blogger $blogger
     *
     * @return BloggerInfo
     */
    public function setBlogger(\Blogger\BloggerBundle\Entity\Blogger $blogger = null)
    {
        $this->blogger = $blogger;

        return $this;
    }

    /**
     * Get blogger
     *
     * @return \Blogger\BloggerBundle\Entity\Blogger
     */
    public function getBlogger()
    {
        return $this->blogger;
    }
}
