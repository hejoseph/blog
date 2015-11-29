<?php

namespace Blog\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity(repositoryClass="Blog\BlogBundle\Repository\BlogRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Blog
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=20, nullable=true)
     */
    private $image;

    /**
    * @ORM\OneToOne(targetEntity="Picture", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $picture;

    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="blogs", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $category;

    /**
    * @ORM\ManyToOne(targetEntity="Blogger\BloggerBundle\Entity\Blogger", inversedBy="blog")
    * @ORM\JoinColumn(nullable=true)
    */
    private $blogger;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text", nullable=true)
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="blog", cascade={"remove"})
     */
    private $comments = array();

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     *
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $popularity;


    public function __construct()
    {
        $this->comments = new ArrayCollection();

        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
        $this->popularity = 0;
        $this->tags = "";
        $this->image = "";
        $this->author = "";
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Blog
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle($length = null)
    {
        if (false === is_null($length) && $length > 0)
            return substr($this->title, 0, $length);
        else
            return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Blog
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent($length = null)
    {
        if (false === is_null($length) && $length > 0)
            return substr($this->content, 0, $length);
        else
            return $this->content;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Blog
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Blog
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Blog
     */
    public function setComments($comment)
    {
        $this->comments = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Blog
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Blog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    
    /**
     * Add comment
     *
     * @param \Blog\BlogBundle\Entity\Comment $comment
     *
     * @return Comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setBlog($this);
        return $this;
    }

    

    

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }


    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

    public function __toString()
{
    return $this->getTitle();
}


    

    /**
     * Gets the value of popularity.
     *
     * @return mixed
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * Sets the value of popularity.
     *
     * @param mixed $popularity the popularity
     *
     * @return self
     */
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function addPopularity(){
        $this->popularity = $this->popularity+1;
        return $this;
    }

    /**
     * Set picture
     *
     * @param \Blog\BlogBundle\Entity\Image $picture
     *
     * @return Blog
     */
    public function setPicture(\Blog\BlogBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \Blog\BlogBundle\Entity\Image
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set category
     *
     * @param \Blog\BlogBundle\Entity\Category $category
     *
     * @return Blog
     */
    public function setCategory(\Blog\BlogBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Blog\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set blogger
     *
     * @param \Blogger\BloggerBundle\Entity\Blogger $blogger
     *
     * @return Blog
     */
    public function setBlogger(\Blogger\BloggerBundle\Entity\Blogger $blogger)
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
