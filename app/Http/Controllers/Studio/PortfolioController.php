<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Http\Requests\Studio\PortfolioRequest;
use App\DataTables\Studio\PortfolioDataTable;

class PortfolioController extends Controller
{
    public function index(PortfolioDataTable $datatable){
        return $datatable->render('studios.portfolio.index');
    }

    public function create(){
        return view('studios.portfolio.create');
    }

    public function store(PortfolioRequest $request){
        if($request->hasFile('image')) {
            $strippedName = str_replace(' ', '', $request->file('image')->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            $request->file('image')->move(storage_path('app/public/portfolio/'), $photoName);
        }

        $portfolio = Portfolio::create([
            'user_id' => $request->user()->id,
            'category' => $request->title,
            'portfolio_image' => $photoName
        ]);

        return redirect()->route('studio.portfolios')->with('success', 'New Portfolio Created.');
    }

    public function delete(Portfolio $portfolio){
        $portfolio->delete();
        return redirect()->route('studio.portfolios')->with('success', 'Portfolio Deleted.');
    }
}
