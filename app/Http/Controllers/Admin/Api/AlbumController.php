<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Admin\CreateAlbumRequest;
use App\Models\Album;
use App\Models\User;

class AlbumController extends BaseApiController
{
    public function create(CreateAlbumRequest $request) {

        $album = Album::create([
            'user_id' => $request->studio_id,
            'remark' => $request->remark,
            'thumb_image' => $request->thumb_image,
            'album_url' => $request->album_url,
            'pin' => $request->pin,
            'mobile' => $request->mobile,
        ]);

        $studio = User::find($request->studio_id);
        $msg = str_replace(['#studio#', '#remark#', '#pin#'], [$studio->name, $request->remark, $request->pin], config('custom.sms.albumtpl'));
        
        sendSms($studio->mobile, $msg);
        
        return Self::sendResponse([], 'New Album Created Successfully');
    }
}
