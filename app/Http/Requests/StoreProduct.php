<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => 'bail|required|string|unique:products|max:255',
            'code' => 'bail|required|max:255',
            'price' => 'bail|required|numeric|between:0,9999999',
            'gst' => 'bail|required',
            'image' => 'bail|required',
        ];
    }
}
