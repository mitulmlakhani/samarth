<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseApiController;
use App\Models\Album;

class AlbumController extends BaseApiController
{
    public function get($code) {
        $album = Album::where('pin', $code)->with('studio')->first();
        if($album) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $album->studio->id,
                    'name' => $album->studio->name,
                    'logo' => $album->studio->avatar_url,
                    'mobile' => $album->studio->mobile,
                    'email' => $album->studio->email,
                    'address' => $album->studio->address,
                    'location' => $album->studio->location,
                    'facebook_link' => $album->studio->facebook_link,
                    'instagram_link' => $album->studio->instagram_link,
                    'pinrest_link' => $album->studio->pinrest_link,
                    'website' => $album->studio->website,
                    'albums' => [
                        'id' => $album->id,
                        'name' => $album->remark,
                        'thumb_image' => $album->thumb_image,
                        'url' => $album->album_url,
                    ]
                ],
                'message' => 'Welcome to your studio.',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'errors' => new \StdClass(),
            'message' => 'Invalid Album Id.',
        ], 404);
    }
}
