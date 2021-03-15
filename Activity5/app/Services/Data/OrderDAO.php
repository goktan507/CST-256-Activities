<?php
namespace App\Services\Data;


class OrderDAO{

    private $dbObject;

    private $database = "activity3";
        
    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
    }
    
    public function addOrder(string $product, int $customerID){
        $this->dbQuery = "INSERT INTO `order` (`Product`, `customer_CustomerID`) VALUES (' $product', '$customerID')";
        if ($this->dbObject->query($this->dbQuery)) {
            return TRUE;
        }
        return FALSE;
    }
}

