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
            return Self::sendResponse(['token' => Auth::guard('admin')->user()->createToken('SAMARTH')->accessToken], 'Login Success');
        }
        return Self::sendError(new \StdClass(), 'Invalid Username and password.', 400);
    }
}
