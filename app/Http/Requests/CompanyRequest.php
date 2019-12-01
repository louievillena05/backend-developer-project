<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'logo' => 'mimes:jpeg,jpg,png,gif|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'logo.dimensions' => 'logo must have a minimum size of 100x100.',
        ];
    }
}
