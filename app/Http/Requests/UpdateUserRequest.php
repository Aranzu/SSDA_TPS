<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            //'name' => 'required|min:2',
            'rut'=> 'unique:users,rut',
            'username' => 'unique:users,username',
            'email' =>'unique:users,email',
            //'password' => 'required|min:8',
            //'password_confirmation' => 'required|same:password',
            //'cargo' => 'required|min:2'
        ];
    }
    
}