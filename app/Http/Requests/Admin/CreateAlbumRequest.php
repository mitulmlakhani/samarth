<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlbumRequest extends FormRequest
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
            'studio_id' => 'required|exists:users,id',
            'remark' => 'required',
            'thumb_image' => 'nullable|url',
            'album_url' => 'required|url',
            'pin' => 'required',
            'mobile' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'thumb_image.url' => 'Please enter valid image url.',
            'album_url.url' => 'Please enter valid album url.',
        ];
    }
}
