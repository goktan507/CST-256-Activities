<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

class SecurityService
{
    private $dao;
    
    public function __construct(){
        $this->dao = new SecurityDAO();
    }
    
    public function login(UserModel $user){
        return $this->dao->findByUser($user);
    }
}

