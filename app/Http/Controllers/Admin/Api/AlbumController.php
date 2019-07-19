<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Admin\CreateAlbumRequest;
use App\Models\Album;

class AlbumController extends BaseApiController
{
    public function create(CreateAlbumRequest $request) {
        $strippedName = str_replace(' ', '', $request->file('thumb_image')->getClientOriginalName());
		$photoName = time() .'_'. $strippedName;
        $request->file('thumb_image')->move(storage_path('app/public/album_thumbs/'), $photoName);

        $album = Album::create([
            'user_id' => $request->studio_id,
            'remark' => $request->remark,
            'thumb_image' => '',
            'album_url' => $request->album_url,
            'pin' => $request->pin,
            'mobile' => $request->mobile,
        ]);

        return Self::sendResponse([], 'New Album Created Successfully');
    }
}
