<?php

namespace App\Http\Controllers\Studio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Datatables\StudioAlbumDataTable;

class AlbumController extends Controller
{
    public function index(StudioAlbumDataTable $datatable){
       return $datatable->render('studios.album.index');
    }  
}
