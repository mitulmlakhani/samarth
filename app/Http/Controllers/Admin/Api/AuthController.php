<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends BaseApiController
{
    use AuthenticatesUsers;

    protected function guard(){
        return Auth::guard('admin');
    }

    public function login(Request $request){
        if($this->attemptLogin($request)){        
            $admin = Auth::guard('admin')->user();    
            return Self::sendResponse(['name' => $admin->name, 'email' => $admin->email, 'mobile' => $admin->mobile, 'avatar' => url('storage/user_default.png'),'token' => $admin->createToken('SAMARTH')->accessToken], 'Login Success');
        }
        return Self::sendError(new \StdClass(), 'Invalid Username and password.', 400);
    }
}
