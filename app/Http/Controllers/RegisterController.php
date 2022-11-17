<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }
    public function testing(){
        if(!empty($_POST['opciones'])) {
            $option = $_POST['opciones'];
            return $option;
        }
    }
    public function register(RegisterRequest $request){

        $user = User::create($request->validated())->assignRole($this->testing());
        return redirect()->back()->with('success', 'Usuario Creado Exitosamente.');
    }


}
