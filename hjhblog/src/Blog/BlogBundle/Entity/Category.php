<?php

namespace Blog\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Blog\BlogBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
    * @ORM\OneToMany(targetEntity="Blog", mappedBy="category", cascade={"persist"})
    */
    private $blogs;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->blogs = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the value of blogs.
     *
     * @return mixed
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * Sets the value of blogs.
     *
     * @param mixed $blogs the blogs
     *
     * @return self
     */
    private function setBlogs($blogs)
    {
        $this->blogs = $blogs;

        return $this;
    }

    /**
     * Add blog
     *
     * @param \Blog\BlogBundle\Entity\Blog $blog
     *
     * @return Blogger
     */
    public function addBlog(\Blog\BlogBundle\Entity\Blog $blog)
    {
        $this->blog[] = $blog;

        $blog->setCategory($this);

        return $this;
    }


    public function __toString()
    {
        return $this->getName();
    }
}

