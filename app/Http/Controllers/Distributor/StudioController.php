<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Distributor\StudioRequest;
use App\DataTables\Distributor\StudioDataTable;

class StudioController extends Controller
{
    public function index(StudioDataTable $datatable) {
        return $datatable->render('distributor.studio.list');
    }

    public function create () {
        return view('distributor.studio.create');
    }

    public function store(StudioRequest $request) {
        $user = User::create([
            'distributor_id' => $request->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->mobile),
            'membership_till' => date('Y-m-d', strtotime('+1 year'))
        ]);

        return redirect()->route('distributor.studios')->with('success', 'New studio created successfully.');
    }

    public function edit(User $user) {
        return view('distributor.studio.edit')->with(['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'mobile' => $user->mobile, 'validity' => $user->membership_till]);
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

        return redirect()->route('distributor.studios')->with('success', 'Studio updated successfully.');
    }

    public function delete(User $user) {
        $user->delete();

        return redirect()->route('distributor.studios')->with('success', 'Studio deleted successfully.');
    }
}
