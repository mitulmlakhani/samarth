<?php

namespace App\Http\Requests\Distributor;

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
        return [
            'name' => 'required',
            'mobile' => 'required|digits:10|unique:users,mobile'.($this->isMethod('PUT') ? ','.$this->route('user')->id : ''),
            'email' => 'required|email|unique:users,email'.($this->isMethod('PUT') ? ','.$this->route('user')->id : ''),
        ];
    }
}
