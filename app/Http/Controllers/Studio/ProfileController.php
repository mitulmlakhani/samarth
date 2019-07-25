<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        return view('studios.profile');
    }
    
    public function save(Request $request) {
        $user = $request->user();

        $photoName = $user->avatar;
        if($request->hasFile('image')) {
            $strippedName = str_replace(' ', '', $request->file('image')->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            $request->file('image')->move(storage_path('app/public/'), $photoName);
        }

        $user->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'location' => $request->location,
            'avatar' => $photoName,
        ]);
        $user->save();

        return redirect()->route('studio.profile')->with('success', 'Profile Updated Successfully.');
    }

    public function changePassword(Request $request) {
        
    }
}
