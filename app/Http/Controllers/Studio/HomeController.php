<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'albums' => \App\Models\Album::where('user_id', auth()->user()->id)->count(),
            'banners' => \App\Models\Banner::where('user_id', auth()->user()->id)->count(),
            'services' => \App\Models\Service::where('user_id', auth()->user()->id)->count(),
            'portfolio' => \App\Models\Portfolio::where('user_id', auth()->user()->id)->count(),
            'team' => \App\Models\Team::where('user_id', auth()->user()->id)->count(),
        ]);
    }
}
