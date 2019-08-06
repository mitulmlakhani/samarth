<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\StudioRequest;
use App\DataTables\StudioDataTable;

class StudioController extends Controller
{
    public function index(StudioDataTable $datatable) {
        return $datatable->render('admin.studio.list');
    }

    public function create () {
        return view('admin.studio.create');
    }

    public function store(StudioRequest $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->mobile),
        ]);

        return redirect()->route('admin.studios')->with('success', 'New studio created successfully.');
    }

    public function edit(User $user) {
        return view('admin.studio.edit')->with(['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'mobile' => $user->mobile, 'validity' => $user->membership_till]);
    }

    public function update(StudioRequest $request, User $user){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'membership_till' => $request->validity,
        ]);

        if($request->album_credit) {
            $user->album_credit = $user->album_credit+$request->album_credit;
            $user->save();
        }

        return redirect()->route('admin.studios')->with('success', 'Studio updated successfully.');
    }

    public function delete(User $user) {
        $user->delete();
        
        return redirect()->route('admin.studios')->with('success', 'Studio deleted successfully.');
    }
}
