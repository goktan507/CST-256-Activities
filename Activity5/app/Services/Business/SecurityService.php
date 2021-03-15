<?php
namespace App\Services\Business;

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;
use App\Services\Data\CustomerDAO;
use App\Services\Data\OrderDAO;
use App\Services\Data\Utility\DBConnect;

class SecurityService
{
    private $dao;
        
    public function login(UserModel $user){
        $this->dao = new SecurityDAO();
        return $this->dao->findByUser($user);
    }
    
    public function addCustomer(CustomerModel $customer){
        $this->dao = new CustomerDAO();
        return $this->dao->addCustomer($customer);
    }
    
    public function addOrder(string $product, int $customerID){
        $this->dao= new OrderDAO();
        return $this->dao->addOrder($product, $customerID);
    }
    
    public function addAllInformation(string $product, int $customerID, CustomerModel $customer) {
        $conn = new DBConnect("activity3");
        
        $dbObj = $conn->getDbConnect();
        
        $conn->setDbAutocommitTrue(FALSE);
        $conn->beginTransaction();
        
        $this->dao = new CustomerDAO($dbObj);
        
        $customerID = $this->dao->getNextID();
        
        $isSuccessful = $this->dao->addCustomer($customer);
        $this->dao = new OrderDAO($dbObj);
        $isSuccessfulOrder = $this->dao->addOrder($product, $customerID);
        if($isSuccessful && $isSuccessfulOrder){
            $conn->commitTransaction();
            return true;
        }
        else{
            $conn->rollbackTransaction();
            return false;
       }
    }
    
    public function getAllUsers(){
        $this->dao = new SecurityDAO();
        return $this->dao->findAllUsers();
    }
    
    public function getUser($id){
        $this->dao = new SecurityDAO();
        return $this->dao->findUserByID($id);
    }
}

