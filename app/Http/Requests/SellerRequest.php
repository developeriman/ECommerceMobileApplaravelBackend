<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'store_name'=>'required',
            'seller_name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:tbl_seller',
            'password' => 'required',
        ];
    }
}