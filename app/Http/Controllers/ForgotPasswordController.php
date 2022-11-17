<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Alert;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**

    * Write code on Method

    *

    * @return response()

    */

    public function showForgetPasswordForm(){

        return view('auth.forgetPassword');

    }
    /**

    * Write code on Method

    *

    * @return response()

    */

    public function submitForgetPasswordForm(Request $request){

        $request->validate(['email' => 'required|email|exists:users',]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
        ]);
        Mail::send('auth.email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Restablecer Contraseña Sistema Sorteo Test de Drogas y Alcohol.');
        });

        return back()->with('success', '¡Le hemos enviado por correo electrónico su enlace de restablecimiento de contraseña!');
    }

    /**

    * Write code on Method

    *

    * @return response()

    */

    public function showResetPasswordForm($token) {

        return view('auth.forgetPasswordLink', ['token' => $token]);

    }
    /**

    * Write code on Method

    *

    * @return response()

    */

    public function submitResetPasswordForm(Request $request){

        $request->validate([

            'email' => 'required|email|exists:users',

            'password' => 'required|string|min:8|confirmed|max:20',

            'password_confirmation' => 'required|same:password'

        ]);

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token])->first();

        if(!$updatePassword){

            return back()->withInput()->with('error', 'El token de restablecimiento de contraseña es inválido.');

        }

        $user = User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);
        //$user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();


        return redirect('/login')->with('success', '¡Su contraseña ha sido cambiada!');

    }
}
