<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckRut;
class RegisterRequest extends FormRequest
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
            'name' => 'required|between:5,30',
            'rut'=> ['required', new CheckRut()],
            'username' => ['required','max:20','unique:users,username'],
            'email' =>'required|unique:users,email',
            'password' => 'required|between:8,20',
            'password_confirmation' => 'required|same:password',
            'cargo' => ['required', 'max:35']
        ];
    }
}
