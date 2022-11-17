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
        $command = "create or replace PROCEDURE SP_COUNT_SORTEOS_USER (USER_N IN NUMBER, USER_COUNT OUT VARCHAR2, POSITION_C OUT VARCHAR2 )
                    AS
                        begin
                        select count(user_id) INTO USER_COUNT from lista where (user_id = USER_N);
                        SELECT CARGO INTO POSITION_C FROM USERS WHERE (ID = USER_N);
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
        $command = "DROP PROCEDURE SP_COUNT_SORTEOS_USER";
        DB::connection()->getPdo()->exec($command);
    }
};

