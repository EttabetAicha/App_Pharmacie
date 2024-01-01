<?php

namespace App\Models;

class User 
{
    private $cin;
    private $fullName;
    private $email;
    private $password;
    private $type;


    public function __construct($cin, $fullName, $email, $password, $type)
    {
        $this->cin = $cin;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->type = $type;
    }

    // Getters
    public function getCin()
    {
        return $this->cin;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}
