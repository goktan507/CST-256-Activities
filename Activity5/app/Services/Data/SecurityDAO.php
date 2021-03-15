<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use Exception;

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
        try{
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
        } catch(Exception $e){
            Log::info("Exception SecurityDAO: " , $e->getMessage());
            echo $e->getMessage();
        }
        
    }
    
    public function findAllUsers(){
        try{
            $userList = [];
            $user;
            $this->dbQuery = "SELECT * FROM `users`";
            $result = mysqli_query($this->connection, $this->dbQuery);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $user = new UserModel($row['Username'], $row['Password']);
                    array_push($userList, $user);
                }
                mysqli_free_result($result);
                mysqli_close($this->connection);
                return $userList;
            }
            mysqli_close($this->connection);
            return FALSE;
        } catch(Exception $e){
            Log::info("Exception SecurityDAO: " , $e->getMessage());
            echo $e->getMessage();
        }
    }
    
    public function findUserByID($id){
        try{
            $this->dbQuery = "SELECT * FROM `users` WHERE `UserID` = $id";
            $result = mysqli_query($this->connection, $this->dbQuery);
            if ($row = mysqli_fetch_assoc($result)) {
                $user = new UserModel($row['Username'], $row['Password']);
                mysqli_free_result($result);
                mysqli_close($this->connection);
                return $user; 
            }
            mysqli_close($this->connection);
            return FALSE;
        } catch(Exception $e){
            Log::info("Exception SecurityDAO: " , $e->getMessage());
            echo $e->getMessage();
        }
    }
}

