<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use App\Http\Requests\Admin\DistributorRequest;
use App\DataTables\DistributorDataTable;

class DistributorController extends Controller
{
    public function index(DistributorDataTable $datatable) {
        return $datatable->render('admin.distributor.list');
    }

    public function create () {
        return view('admin.distributor.create');
    }

    public function store(DistributorRequest $request) {
        $distributor = Distributor::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->mobile),
        ]);

        return redirect()->route('admin.distributors')->with('success', 'New distributor created successfully.');
    }

    public function edit(Distributor $distributor) {
        return view('admin.distributor.edit')->with(['id' => $distributor->id, 'name' => $distributor->name, 'email' => $distributor->email, 'mobile' => $distributor->mobile]);
    }

    public function update(DistributorRequest $request, Distributor $distributor){
        $distributor->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile
        ]);

        if($request->album_credit) {
            $distributor->album_credit = $distributor->album_credit+$request->album_credit;
            $distributor->save();
        }

        return redirect()->route('admin.distributors')->with('success', 'Studio updated successfully.');
    }

    public function delete(Distributor $distributor) {
        $distributor->delete();

        return redirect()->route('admin.distributors')->with('success', 'Studio deleted successfully.');
    }
}
