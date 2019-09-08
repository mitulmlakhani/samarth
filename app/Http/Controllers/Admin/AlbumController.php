<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AlbumDataTable;
use App\Models\User;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index(AlbumDataTable $datatable) {
        $studios = User::all(['id', 'name', 'mobile']);
        return $datatable->render('admin.album.index', ['studios' => $studios]);
    }

    public function sendAlbumSMS(Album $album){
        $album->load('studio');
        $msg = str_replace(['#studio#', '#remark#', '#pin#'], [$album->studio->name, $album->remark, $album->pin], config('custom.sms.albumtpl'));
        sendSms($album->studio->mobile, $msg);
        return redirect()->route('admin.albums')->with('success', 'Album studio SMS sent successfully.');
    }

    public function showExportForm(){
        $albums = Album::with('studio:id,name')->get();
        return view('admin.album.export')->with('albums', $albums);
    }

    public function exportAlbumPDF(Request $request){
        $pdf = \PDF::setPaper('a4', 'landscape')->loadView('admin.album.album_pdf', ['codes' => $request->albums]);
        return $pdf->download('album_pdf.pdf');
    }

    public function delete(Album $album){
        $album->delete();

        return redirect()->route('admin.albums')->with('success', 'Album deleted successfully.');
    }
}
