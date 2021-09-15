<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
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
            'name' => [ 
                'bail', 'required', 'string', 'max:255',
                Rule::unique('products')->ignore( request()->product ),
            ],
            'code' => 'bail|required|max:100',
            'price' => 'bail|required|numeric|between:0,9999999',
            'gst' => 'bail|required|numeric|between:0,9999999',
            'image' => 'bail|required',
        ];
    }
}
