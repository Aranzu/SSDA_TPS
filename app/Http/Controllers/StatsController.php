<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Config;

class StatsController extends Controller
{
    public function show (){
        //Se genera la conexión con la cuenta de admin de base de datos
        $conn = oci_new_connect(config('oracle_conn_procedures.username'), config('oracle_conn_procedures.password'), config('oracle_conn_procedures.host/bd'),"AL32UTF8");

        //Log::info($conn);

        /*if (!$conn) {
            $m = oci_error();
            trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }*/

        $curs = oci_new_cursor($conn);
        $stid = oci_parse($conn, "begin SP_COUNT_EMP_RAFFLE_CURSOR(:cursbv); end;");
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
        $notes = array();
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            $notes[]=$row;
            //Log::info($row);
        }

        //Log::info($stats_data);

        oci_free_statement($stid);
        oci_free_statement($curs);
        oci_close($conn);

        return view('stats.stats')->with(['notes' => $notes]);
    }

 }
