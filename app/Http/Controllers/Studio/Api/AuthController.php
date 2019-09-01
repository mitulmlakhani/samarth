<?php

namespace App\Http\Controllers\Studio\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Studio\Api\LoginRequest;
use App\Models\User;

class AuthController extends BaseApiController
{
    public function login(LoginRequest $request){
        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {
            if(\Hash::check($request->password, $user->password)) {
                $token = $user->token ?: $this->generateToken($user);

                return Self::sendResponse([
                    'name' => $user->name,
                    'email' => $user->email,
                    'mobile' => $user->mobile,
                    'avatar' => $user->avatar_url,
                    'token' => $token,
                    'album_credit' => $user->album_credit,
                    'album_created' => $user->album_created,
                    'membership_till' => $user->membership_till ?: "",
                    'joined_at' => $user->created_at,
                ], 'Login Successfull');
            }
        }

        return Self::sendError(new \StdClass(), 'Invalid username and password.', 400);
    }

    public function generateToken(User $user){
        $token = \Str::random(60);

        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return $token;
    }

}
