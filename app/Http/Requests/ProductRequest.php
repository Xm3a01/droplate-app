<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'en_name' => 'required',
            'ar_name' => 'required',
            'en_description' => 'required',
            'en_description' => 'required',
            'purchasing_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'wholesale_price' => 'required|numeric',
            'quantity' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ];
    }
}
