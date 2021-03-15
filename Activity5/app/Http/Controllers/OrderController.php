<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\SecurityService;
use App\Models\CustomerModel;

class OrderController extends Controller
{    
    public function index(Request $request) {
        
        $customer = new CustomerModel($request->input('firstName'), $request->input('lastName'));
        
        $product = $request->input('product');
        $customerID = $request->input('customerID');
        
        $service = new SecurityService();
        $isSuccess = $service->addAllInformation($product, $customerID, $customer);
        
        if($isSuccess)
            echo("Order Data Commited Succesfully");

        else    
           echo("Order Data was Rolled Back");
        return view('Order');
    }
//     public function validateForm(Request $request){
        
//         $rules = [
//             'product' => 'Required | Between: 4, 10 | Alpha',
//             'password' => 'Required | Between: 4, 10'
//         ];
        
//         $this->validate($request, $rules);
//     }
}
