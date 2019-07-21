<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AlbumDataTable;
use App\Models\User;

class AlbumController extends Controller
{
    public function index(AlbumDataTable $datatable) {
        $studios = User::all(['id', 'name', 'mobile']);
        return $datatable->render('admin.album.index', ['studios' => $studios]);
    }
}
