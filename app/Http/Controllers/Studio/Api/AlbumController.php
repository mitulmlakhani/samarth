<?php

namespace App\Http\Controllers\Studio\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseApiController;
use App\Http\Requests\Studio\Api\AlbumRequest;
use App\Models\Album;

class AlbumController extends BaseApiController
{
    public function create(AlbumRequest $request)
    {
        $album = Album::create([
            'user_id' => $request->user()->id,
            'remark' => $request->remark,
            'thumb_image' => $request->thumb_image,
            'album_url' => $request->album_url,
            'pin' => $request->pin,
            'mobile' => $request->mobile,
        ]);

        $msg = str_replace(['#studio#', '#remark#', '#pin#'], [$request->user()->name, $request->remark, $request->pin], config('custom.sms.albumtpl'));
        
        sendSms(auth()->user()->mobile, $msg);
        $request->user()->album_created++;
        $request->user()->save();
        return Self::sendResponse([], 'New Album Created Successfully');    
    }
}
