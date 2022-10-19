<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoModuleRequest extends FormRequest
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
            'title' => 'required',
            'publisher' => 'required',
            'developer' => 'required',
            'relase_date' => 'required',
            'region' => 'required',
            'platform' => 'required',
            'related_link' => 'required', 
        ];
    }
}