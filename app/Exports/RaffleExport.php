<?php

namespace App\Exports;

use App\Models\ListaRaffle;
use App\Models\Raffle;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Contracts\Queue\ShouldQueue;


class RaffleExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {       
        return Raffle::query()->select('raffle.RUT','raffle.NAME','raffle.CARGO','raffle.created_at as Fecha')
                              ->join('lista_raffle', 'lista_raffle.raffle_id', '=','raffle.id')
                              ->where('lista_raffle.lista_id', '=', $this->id);

        /*return Raffle::query()->select(
                                "select ra.RUT,ra.NAME,ra.CARGO,to_char(ra.created_at,'yyyy-mm-dd')
                                from lista_raffle li join raffle ra
                                on (li.raffle_id = ra.id)
                                where li.lista_id = ", $this->id);*/
    }

    public function headings(): array
        {
            return [
                'Nº',
                'Rut',
                'Nombre',
                'Cargo',
                'Fecha',
            ];
    }
}