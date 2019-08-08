<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudioRequest extends FormRequest
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
        $update = [];
        if($this->isMethod('PUT')) {
            $update['validity'] = 'required|after:today';
        }

        return array_merge([
            'name' => 'required',
            'mobile' => 'required|digits:10|unique:users,mobile'.($this->isMethod('PUT') ? ','.$this->route('user')->id : ''),
            'email' => 'required|email|unique:users,email'.($this->isMethod('PUT') ? ','.$this->route('user')->id : ''),
            'album_credit' => 'nullable|integer|min:0'
        ], $update);
    }
}
