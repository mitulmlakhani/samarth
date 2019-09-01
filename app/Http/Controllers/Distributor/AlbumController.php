<?php

namespace App\Http\Controllers\Distributor;

use App\Http\Controllers\Controller;
use App\DataTables\Distributor\AlbumDataTable;
use App\Models\User;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(AlbumDataTable $datatable) {
        $studios = User::all(['id', 'name', 'mobile']);
        return $datatable->render('distributor.album.index', ['studios' => $studios]);
    }

    public function delete(Album $album){
        $album->delete();

        return redirect()->route('distributor.albums')->with('success', 'Album deleted successfully.');
    }
}
