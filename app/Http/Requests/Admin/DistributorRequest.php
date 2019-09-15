<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DistributorRequest extends FormRequest
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
            'mobile' => 'required|digits:10|unique:distributors,mobile'.($this->isMethod('PUT') ? ','.$this->route('distributor')->id : ''),
            'email' => 'required|email|unique:distributors,email'.($this->isMethod('PUT') ? ','.$this->route('distributor')->id : ''),
        ];
    }
}
