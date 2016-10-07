<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductoRequest extends Request
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
            'producto' => 'required|max:255',
            'precio' => 'required|integer|min:0',
            'color' => 'required|max:255',
            'stock' => 'required|integer|min:0',
            'users_id' => 'required|integer|exists:users,id'
        ];
    }
}
