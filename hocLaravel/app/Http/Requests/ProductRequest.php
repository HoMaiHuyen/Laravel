<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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

    protected function withVallidator($validator){
        $validator->after(function($validator){
            // if ($this->somethingElseInvalid()) {
            //     $validator->errors()->add('field', 'Something is wrong');
            // }

            if ($validator->errors()->count()>0){
                $validator->errors()->add('field', 'Something is wrong');
            };
        });
    }

    protected function prepareForValidation(){
        $this->merge([
            'create_at'=>date('Y-m-d H:i:s'),
        ]);
    }

    protected function failedAuthorization()
    {
        // throw new AuthorizationException('You do not have access');
        // throw new HttpResponseException(redirect('/')->with('msg', 'You do not have access')->with('type', 'danger'));
        throw new HttpResponseException(abort(404));
    }
}
