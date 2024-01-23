<?php

//Classe User que me servirá para validar el Login - Shah Zaib Asghar Munir - 23/01/2024
class User
{

    private $username;
    private $password;
    private $rol;

    /**
     * @param $username
     * @param $password
     * @param $rol
     */
    public function __construct($username = NULL, $password = NULL, $rol = NULL)
    {
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;

    }


    // Getters

    /**
     * @return mixed|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed|null
     */
    public function getRol()
    {
        return $this->rol;
    }





    // Setters

    /**
     * @param mixed|null $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed|null $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed|null $rol
     */
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }







}
