<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Studio\TeamRequest;
use App\Models\Team;
use App\DataTables\Studio\TeamDataTable;

class TeamController extends Controller
{
    public function index(TeamDataTable $datatable){
        return $datatable->render('studios.team.index');
    }

    public function create(){
        return view('studios.team.create');
    }

    public function store(TeamRequest $request){
        if($request->hasFile('image')) {
            $strippedName = str_replace(' ', '', $request->file('image')->getClientOriginalName());
            $photoName = time() .'_'. $strippedName;
            $request->file('image')->move(storage_path('app/public/team/'), $photoName);
        }

        $team = Team::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'position' => $request->position,
            'avatar' => $photoName,
        ]);

        return redirect()->route('studio.team')->with('success', 'New Team Member Created.');
    }

    public function delete(Team $team){
        $team->delete();
        return redirect()->route('studio.team')->with('success', 'Team Member Deleted.');
    }
}
