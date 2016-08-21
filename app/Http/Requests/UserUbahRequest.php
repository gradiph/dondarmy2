<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Input;

class UserUbahRequest extends Request
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
            'nama' => 'required',
            'username' => 'required|unique:users,username,'.Input::get('id'),
            'role' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong.',
            'username.required' => 'Username tidak boleh kosong.',
            'username.unique' => 'Username sudah digunakan.',
            'role.required' => 'Role tidak boleh kosong.',
        ];
    }
}
