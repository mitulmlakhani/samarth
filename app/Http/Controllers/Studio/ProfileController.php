<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\Studio\ProfileRequest;
use App\Http\Requests\Studio\SocialLinksRequest;

class ProfileController extends Controller
{
    public function index() {
        return view('studios.profile');
    }
    
    public function save(ProfileRequest $request) {
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
            'website_username' => $request->website_username,
            'address' => $request->address,
            'location' => $request->location,
            'theme' => $request->theme,
            'avatar' => $photoName,
        ]);
        $user->save();

        return redirect()->route('studio.profile')->with('success', 'Profile Updated Successfully.');
    }

    public function showChangePassword(){
        return view('studios.changepassword');
    }

    public function changePassword(ChangePasswordRequest $request) {
        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('studio.password.change')->with('success', 'Your password has been changed.');
    }

    public function socialLinks(){
        return view('studios.sociallinks');
    }
    
    public function saveSocialLinks(SocialLinksRequest $request){
        $user = auth()->user();
        $user->facebook_link = $request->facebook_link;
        $user->instagram_link = $request->instagram_link;
        $user->pinrest_link = $request->pinrest_link;
        $user->website = $request->website;
        $user->save();

        return redirect()->route('studio.social')->with('success', 'Your social details changed.');
    }
}
