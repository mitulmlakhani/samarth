<?php

namespace App\Http\Requests\Studio;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,'.auth()->user()->id,
            'email' => 'required|unique:users,email,'.auth()->user()->id,
            'website_username' => 'required|unique:users,website_username,'.auth()->user()->id,
            'address' => 'required',
            'location' => 'required',
            'avatar' => 'nullable|mimes:jpeg,jpg,png',
        ];
    }
}
