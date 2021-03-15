<?php
namespace App\Services\Data;

use App\Models\CustomerModel;
use Exception;


class CustomerDAO
{
    private $dbObject;
    private $dbQuery;
    private $database = "activity3";
    
    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
    }
    
    public function addCustomer(CustomerModel $customer){
        
        $firstName = $customer->getFirstName();
        $lastName = $customer->getLastName();
        $this->dbQuery = "INSERT INTO `customer` (`FirstName`, `LastName`) VALUES ('$firstName', '$lastName')";
        
        if ($this->dbObject->query($this->dbQuery)) {
            //$this->conn->closeDbConnection();
            return TRUE;
        }
        //$this->conn->closeDbConnection();
        return FALSE;
    }
    
    public function getNextID(){
        try {
            $this->dbQuery = "SELECT `CustomerID` FROM `customer` ORDER BY `CustomerID` DESC LIMIT 0,1";
            $result = $this->dbObject->query($this->dbQuery);
            while($row = mysqli_fetch_array($result)){
                return $row['CustomerID'] + 1;
            }
        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

