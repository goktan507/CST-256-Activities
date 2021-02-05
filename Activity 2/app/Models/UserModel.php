<?php
namespace App\Models;

class UserModel
{
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->password = $password;
        $this->username = $username;
    }
    
    
    /**
     * Getter for username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Getter for password
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}

