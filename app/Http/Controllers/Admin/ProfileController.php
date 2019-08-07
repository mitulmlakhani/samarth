<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function showChangePassword(){
        return view('admin.changepassword');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.password.change')->with('success', 'Your password has been changed.');
    }
}
