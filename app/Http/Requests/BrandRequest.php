<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name' => 'required | string | unique:tbl_brand',
            // 'email' => 'required|email',
            // 'contact_number' => 'required',
            // 'address' => 'required',
            // 'logo' => 'required | max:5020',
            // 'logo.*' => 'logo | mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}