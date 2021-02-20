<?php
namespace App\Services\Data\Utility;

use \mysqli;

class DBConnect
{
    private $connection;
    private $servername;
    private $username;
    private $password;
    private $database;
    
    public function __construct(string $dbname) {
        $this->database = $dbname;
        $this->servername = "localhost";
        $this->password = "root";
        $this->username = "root";
    }
    public function getDbConnect(){
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if($this->connection->connect_errno){
            echo "Failed to connect to MySQL: " . $this->connection->connect_errno;
            exit();
        }
        return $this->connection;
    }
    
    public function closeDbConnection(){
        return $this->connection->close();
    }
    
    public function setDbAutocommitTrue(bool $status) {
        return $this->connection->autocommit($status);
    }
    
    public function beginTransaction(){
        return $this->connection->begin_transaction();
    }
    
    public function commitTransaction(){
        return $this->connection->commit();
    }
    
    public function rollbackTransaction(){
        return $this->connection->rollback();
    }
    
}
