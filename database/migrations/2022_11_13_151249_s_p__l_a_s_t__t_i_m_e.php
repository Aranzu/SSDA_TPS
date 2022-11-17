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
        CREATE OR REPLACE PROCEDURE SP_LAST_TIME (USER_N IN NUMBER, TIME_RAF OUT VARCHAR)
        AS
        BEGIN
            SELECT TO_CHAR(CREATED_AT, 'YYYY/MM/DD HH24:MI:SS') INTO TIME_RAF FROM LISTA WHERE ID=(SELECT MAX(ID) FROM LISTA) AND USER_ID = USER_N;
        END;";

        DB::connection()->getPdo()->exec($command);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $command = "DROP PROCEDURE SP_LAST_TIME";
        DB::connection()->getPdo()->exec($command);
    }
};

