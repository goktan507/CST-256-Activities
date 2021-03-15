<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{    
    public function index(Request $request) {
        Log::info("Entering LoginController Index()");
        $this->validateForm($request);
        
        $user = new UserModel($request->get('user_name'),  $request->get('password'));
        
        Log::info("Parameters are : ", array(
            "username"=>$request->input('user_name'), 
            "password"=>$request->input('password')
        ));
        
        $service = new SecurityService();
        $isSuccess = $service->login($user);
        
        if($isSuccess){
            Log::info("Exit LoginController::index() login passing");
            session()->put('security', 'enabled');
            return view('loginPassed');
        }
        Log::info("Exit LoginController::index() login failing");
        return view('loginFailed');
    }
    public function validateForm(Request $request){
        
        $rules = [
            'user_name' => 'Required | Between: 4, 10 | Alpha',
            'password' => 'Required | Between: 4, 10'
        ];
        
        $this->validate($request, $rules);
    }
    
    public function logout(Request $request){
        Log::info("Entering LoginController@logout");
        Auth::logout();
        session()->put('security', 'disabled');
        return redirect('/');
    }
}
