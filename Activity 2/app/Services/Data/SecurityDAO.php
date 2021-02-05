<?php
namespace App\Services\Data;

use App\Models\UserModel;

class SecurityDAO
{
    private $connection;
    private $dbQuery;
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $database = "activity2";
 
    public function __construct() {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    }
    
    public function findByUser(UserModel $user){
        $username = $user->getUsername();
        $password = $user->getPassword();
        $this->dbQuery = "SELECT Username, Password FROM `users` WHERE `Username`='$username' AND `Password`='$password'";
        $result = mysqli_query($this->connection, $this->dbQuery);
        if (mysqli_num_rows($result) > 0) {
            mysqli_free_result($result);
            mysqli_close($this->connection);
            return TRUE;
        }
        mysqli_close($this->connection);
        return FALSE;
    }
    
}

