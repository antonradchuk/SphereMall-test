<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 12.11.17
 * Time: 00:42
 */

namespace Model;


class Feedback
{
    private $id;
    private $firstName;
    private $secondName;
    private $email;
    private $message;
    private $imagePath;
    private $image;

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId ( $id )
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName ()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return $this
     */
    public function setFirstName ( $firstName )
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecondName ()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $secondName
     * @return $this
     */
    public function setSecondName ( $secondName )
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail ()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail ( $email )
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage ()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage ( $message )
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImagePath ()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     * @return $this
     */
    public function setImagePath ( $imagePath )
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage ()
    {
        return $this->image;


    }

    /**
     * @param mixed $image
     * @return $this
     */
    public function setImage ( $image )
    {
        $this->image = $image;

        return $this;
    }



}