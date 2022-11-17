<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $command = "
                CREATE OR REPLACE PROCEDURE SP_COUNT_EMP_RAFFLE_CURSOR (CURSOR_RAF OUT SYS_REFCURSOR)
                AS
                    begin
                    OPEN CURSOR_RAF FOR
                    SELECT  rut, name, cargo, count(rut) as valor FROM raffle
                    group by rut, name, cargo
                    ORDER BY valor DESC;
                end;"
                ;

        DB::connection()->getPdo()->exec($command);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $command = "DROP PROCEDURE SP_COUNT_EMP_RAFFLE_CURSOR";
        DB::connection()->getPdo()->exec($command);
    }
};
