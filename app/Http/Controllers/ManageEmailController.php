<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddEmailRequest;
use App\Models\Recipients;
use DB;
use Redirect;

class ManageEmailController extends Controller
{
    public function show(){

        $recipients = Recipients::all();
        //$recipients=DB::select('select * from recipients');
        return view('add_emails.add_email', compact('recipients'));
    }

    public function deleteRecipients($id){

        $recipients = Recipients::findOrFail($id);
        $recipients -> delete();
        return Redirect::route('recipients.showEmail');
    }

    public function add_email(AddEmailRequest $request){

        $input = $request->all();
        Recipients::create($input);

        return Redirect::route('recipients.showEmail')->with(['success' => 'Se ha añadido el nuevo Destinario.']);
    }
}
