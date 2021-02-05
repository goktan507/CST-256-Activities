<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{    
    public function index(Request $request) {
        
        $user = new UserModel($request->get('user_name'),  $request->get('password'));
        $service = new SecurityService();
        $isSuccess = $service->login($user);
        
        if($isSuccess)
            return view('loginPassed');
        return view('loginFailed');
    }
}
