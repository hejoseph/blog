<?php

namespace Blog\BlogBundle\Entity;

class Search{
    
    private $string;

    /**
     * Gets the value of string.
     *
     * @return mixed
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * Sets the value of string.
     *
     * @param mixed $string the string
     *
     * @return self
     */
    private function _setString($string)
    {
        $this->string = $string;

        return $this;
    }
}