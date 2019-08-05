<?php

namespace App\Http\Requests\Studio\Api;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'remark' => 'required',
            'thumb_image' => 'nullable|url',
            'album_url' => 'required|url',
            'pin' => 'required',
            'mobile' => 'nullable',
        ];
    }
}
