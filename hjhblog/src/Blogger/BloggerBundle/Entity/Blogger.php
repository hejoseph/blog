<?php
// src/Acme/UserBundle/Entity/User.php

namespace Blogger\BloggerBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="Blogger\BloggerBundle\Repository\BloggerRepository")
 * @ORM\Table(name="Blogger")
 */
class Blogger extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\OneToMany(targetEntity="Blog\BlogBundle\Entity\Blog", mappedBy="blogger",cascade={"persist"})
    */
    private $blog = array();

    /**
    * @ORM\OneToMany(targetEntity="Blog\BlogBundle\Entity\Comment", mappedBy="blogger",cascade={"persist"})
    */
    private $comments = array();

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=20, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=20, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=20, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="dateOfBirth", type="string", length=10, nullable=true)
     */
    private $dateOfBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=6, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=100, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=10, nullable=true)
     */
    private $zipcode;

    public function __construct()
    {
        parent::__construct();
        // your own logic

        $this->blog = new ArrayCollection();
        $this->comments = new ArrayCollection();
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
        $blog->setBlogger($this);
        return $this;
    }

    /**
     * Remove blog
     *
     * @param \Blog\BlogBundle\Entity\Blog $blog
     */
    public function removeBlog(\Blog\BlogBundle\Entity\Blog $blog)
    {
        $this->blog->removeElement($blog);
    }

    /**
     * Get blog
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlog()
    {
        return $this->blog;
    }


    public function __toString(){
        return "lol";
    }

    /**
     * Set blog
     *
     * @param string $blog
     *
     * @return Blogger
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Blogger
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getRole()
    {
        if($this->hasRole("ROLE_ADMIN")){
            return "admin";
        }
        return "user";
    }

    /**
     * Add comment
     *
     * @param \Blog\BlogBundle\Entity\Comment $comment
     *
     * @return Comment
     */
    public function addComments(\Blog\BlogBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;
        $comment->setBlogger($this);
        return $this;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Blogger
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Blogger
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Blogger
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Blogger
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Blogger
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set dateOfBirth
     *
     * @param string $dateOfBirth
     *
     * @return Blogger
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Blogger
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
}
