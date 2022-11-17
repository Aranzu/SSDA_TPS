<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function showUsers(){

        $users = DB::table('users')->simplePaginate(5);
        return view('manageUsers.showUsers', compact('users'));
    }


    public function updateUserView($id){

        $user = User::findOrFail($id);
        return view('manageUsers.updateUser', compact('user'));
    }

    
    public function updatePasswordUserView($id){

        $user = User::findOrFail($id);
        return view('manageUsers.updatePasswordUser', compact('user'));
    }

    public function updateUser(Request $request, $id){

        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|between:5,30',
            'username' => ['required','max:20',Rule::unique('users')->ignore($user->id),],
            'email' => ['required', Rule::unique('users')->ignore($user->id),],
            'cargo' => ['required', 'max:35']
        ]);

        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user -> cargo = $request->cargo;

        $user -> save();

        return redirect()->back()->with('success', 'Usuario Actualizado exitosamente.');
    }

    public function updatePasswordUser(Request $request, $id){

        $user = User::findOrFail($id);

        $this->validate($request,[
            'password' => 'required|between:8,20',
            'password_confirmation' => 'required|same:password',
        ]);

        $user -> password = $request->password;
        $user -> save();

        return redirect()->back()->with('success', 'Contraseña Actualizada exitosamente.');
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);
        $user -> delete();
        return redirect('/showUsers');
    }

    public function faq(){
        return view('faq.faq');
    }
}
