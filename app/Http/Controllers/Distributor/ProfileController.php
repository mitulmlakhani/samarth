<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function showChangePassword(){
        return view('distributor.changepassword');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('distributor.password.change')->with('success', 'Your password has been changed.');
    }
}
