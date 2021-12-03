<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserEditRequest extends FormRequest
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
            'id' => 'required|exists:users',
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'max:50',
                Rule::unique('users')->ignore($this->id)
            ],
            'username' => [
                'required',
                'max:30',
                Rule::unique('users')->ignore($this->id)
            ],
            'password' => 'nullable|min:8',
            'level' => 'required|in:admin,superadmin',
            'foto' => 'nullable|file|image',
        ];
    }
}
