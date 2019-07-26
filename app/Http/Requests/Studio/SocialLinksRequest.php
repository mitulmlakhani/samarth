<?php

namespace App\Http\Requests\Studio;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinksRequest extends FormRequest
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
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'pinrest_link' => 'nullable|url',
            'website' => 'nullable|url',
        ];
    }
}
