<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{    
    public function index(Request $request) {
        
        $this->validateForm($request);
        
        $user = new UserModel($request->get('user_name'),  $request->get('password'));
        $service = new SecurityService();
        $isSuccess = $service->login($user);
        
        if($isSuccess)
            return view('loginPassed');
        return view('loginFailed');
    }
    public function validateForm(Request $request){
        
        $rules = [
            'user_name' => 'Required | Between: 4, 10 | Alpha',
            'password' => 'Required | Between: 4, 10'
        ];
        
        $this->validate($request, $rules);
    }
}
