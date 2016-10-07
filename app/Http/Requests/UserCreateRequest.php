<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name' => 'required|max:255',
            'apellido' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'edad' => 'required|numeric|max:100',
            'rol' => 'required',
            'password' => 'required|max:255'
        ];
    }
}
