<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Raffle;
use Illuminate\Support\Facades\DB;
use App\Exports\RaffleExport;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Log;
use Excel;



class HistorialController extends Controller
{
    public function historial(Request $request){
        $currentDate = date('Y-m-d');;
        $fromDate = $request->input('fromDate');
        //Log::info($fromDate);
        $toDate   = $request->input('toDate');
        //Log::info($toDate);
        $query = DB::select("select * from lista where to_char(created_at,'yyyy-mm-dd') >= to_date(?) and to_char(created_at,'yyyy-mm-dd') <= ?", [$fromDate,$toDate]);
        //Log::info($query);

        return view('historial.historial',compact('query','fromDate','toDate','currentDate'));
    }

    public function historialdetalle($id){
        $id_sent=$id;
        $query = DB::table('raffle')
            ->select()
            ->join('lista_raffle', 'lista_raffle.raffle_id', '=','raffle.id')
            ->where('lista_raffle.lista_id', '=', $id)
            ->get();
        return view('historial.historialdetalle', compact('query','id_sent'));
    }


    public function export($id)
    {
        return (new RaffleExport($id))->download('DetalleSorteo.xlsx');
    }

}
