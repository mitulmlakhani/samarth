<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseApiController;
use App\Models\User;

class StudioController extends BaseApiController
{
    public function list(Request $request){
        return Self::sendResponse(User::get(['id', 'name', 'mobile'])->toArray(), 'Album List');
    }
}
