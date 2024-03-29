<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
    public function rules()
    {
        $uniqueEmail = 'unique:users';
        if(session('id')){
            $id = session('id');
            $uniqueEmail = 'unique:users,email,'.$id;
        }

        return [
            'fullname' => 'required|min:5',
            'email' => 'required|email|'. $uniqueEmail,
            'group_id' => ['required', 'integer', function ($attribute, $value, $fail) {
                if ($value == 0) {
                    $fail('You must choose group');
                }
            }],
            'status' => 'required|integer'
        ];
    }
    public function messages()
    {
        return[
            'fullname.required' => 'Full name is require',
            'fullname.min' => 'Fullname at least :min characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email invalid format',
            'email.unique' => 'Email already exits',
            'group_id.required' => 'Group can not be null',
            'group_id.integer' => 'Invalid group',
            'status.required' => 'Can not be null',
            'status.integer' => 'invalid status'
        ];
    }
}
