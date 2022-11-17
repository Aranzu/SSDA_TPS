<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\CheckRaffleRequests;
use App\Http\Requests\CheckFileRequest;
use App\Models\User;
use App\Models\Lista;
use App\Models\ListaRaffle;
use App\Models\Raffle;
use App\Models\Recipients;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailsend;
use Alert;
use Redirect;


class ManualRaffleController extends Controller
{
    public function show(){
        return view('raffle.Manual_raffle');
    }
    public function GenerateManualRaffle(CheckFileRequest $request){
        $porcentaje_manual = request('porcentaje_manual'); //the percentage of randomness
        Session::put('percentage_manual', $porcentaje_manual);
        $resultados = array();
        $recipients = Recipients::all();
        try {
            //log::info($request!=null);
            if($request->file('texto_sorteados')!=null){
                $data_participantes=Excel::toArray(null, $request->file('texto_sorteados'))[0];// tomamos la primera página de excel
                //Log::info($data_participantes);
                $todo=count($data_participantes)*$porcentaje_manual/100;
                for ($i=0; $i < $todo ; $i++) {
                    $x= rand(0,count($data_participantes)-1);
                    $resultados[]=$data_participantes[$x];
                    array_splice($data_participantes, $x, 1);
                }
                Session::put('Lista_sorteados_m', $resultados);

            }
        }
         catch (\Throwable $th) {
        }
        return view('raffle.Manual_raffle', compact('resultados','porcentaje_manual','recipients'));
    }


    public function Save_Manual_Raffle(CheckRaffleRequests $request){
        //
        try{
            if(!empty($request->RecipientsArr)||!empty($request->ExtraRecipientsArr)){
                //Log::info($_POST['ExtraRecipientsArr']);
                if(Session::has('Lista_sorteados_m')){
                    $data_sorteados=Session::get('Lista_sorteados_m');
                }
                $Lista_usuario=Lista::create([
                    'user_id' => auth()->user()->id,
                ]);
                foreach ($data_sorteados as $i => $row) {
                    $data_sorteos_bd=Raffle::create([
                        'rut' => $row[0],
                        'name'=> $row[1],
                        'cargo' => $row[2],
                    ]);
                    $raffle=$data_sorteos_bd->id;
                    $Lista_usuario->raffles()->attach($raffle);
                }
                if(!empty($request->RecipientsArr)){
                    foreach($request->RecipientsArr as $DestinatariosEscogidos){
                        Mail::to($DestinatariosEscogidos)->send(new Mailsend($data_sorteados));
                    }
                }
                if(!empty($request->ExtraRecipientsArr)){
                    foreach($request->ExtraRecipientsArr as $DestinatariosEscogidos){
                        Mail::to($DestinatariosEscogidos)->send(new Mailsend($data_sorteados));
                    }
                }
            }
        }
        catch (\Throwable $th) {
        }
        return Redirect::route('raffle_manual.show')->with(['success' => 'Se ha guardado y enviado el personal sorteado!']);
    }


}
