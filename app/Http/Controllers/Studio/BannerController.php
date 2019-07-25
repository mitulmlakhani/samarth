<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\Studio\BannerRequest;
use App\DataTables\Studio\BannerDataTable;

class BannerController extends Controller
{
    public function index(BannerDataTable $datatable){
        return $datatable->render('studios.banner.index');
    }

    public function create(){
        return view('studios.banner.create');
    }

    public function store(BannerRequest $request){
        if($request->hasFile('image')) {
            $strippedName = str_replace(' ', '', $request->file('image')->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            $request->file('image')->move(storage_path('app/public/banner/'), $photoName);
        }

        $banner = Banner::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'banner_image' => $photoName
        ]);

        return redirect()->route('studio.banners')->with('success', 'New Banner Created.');
    }

    public function delete(Banner $banner){
        $banner->delete();
        return redirect()->route('studio.banners')->with('success', 'Banner Deleted.');
    }
}
