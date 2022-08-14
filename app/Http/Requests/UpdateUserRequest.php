<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:4',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'password' => [
                'nullable',
                'min:4',
                'max:20'
            ],
            'role_id' => [
                'required'
            ]
        ];
    }
}
