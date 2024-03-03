<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|min:6',
            'product_price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'product_name.required' => 'You must enter :attribute',
            'product_name.min' => ':attribute can not least than :min characters',
            'product_price.min' => 'You must enter :attribute',
            'product_price.integer' => ':attribute must be numbers',
        ];
    }

    public function attribute()
    {
        return [
            'product_name'=>'Product name',
            'product_price'=>'Product price'
        ];
    }
}
