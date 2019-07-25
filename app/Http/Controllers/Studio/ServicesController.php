<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Studio\ServiceRequest;
use App\Models\Service;
use App\DataTables\Studio\ServiceDataTable;

class ServicesController extends Controller
{
    public function index(ServiceDataTable $datatable){
        return $datatable->render('studios.services.index');
    }

    public function create(){
        return view('studios.services.create');
    }

    public function store(ServiceRequest $request){
        if($request->hasFile('image')) {
            $strippedName = str_replace(' ', '', $request->file('image')->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            $request->file('image')->move(storage_path('app/public/service/'), $photoName);
        }

        $service = Service::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'service_image' => $photoName,
        ]);

        return redirect()->route('studio.services')->with('success', 'New Service Created.');
    }

    public function delete(Service $service){
        $service->delete();
        return redirect()->route('studio.services')->with('success', 'Service Deleted.');
    }
}
