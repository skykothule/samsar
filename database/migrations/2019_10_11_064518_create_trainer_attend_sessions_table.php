<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerAttendSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trainer_attend_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trainer_id');
            $table->integer('school_id');
            $table->integer('cls_session_id');
            $table->string('total_student');
            $table->string('present_student');
            $table->date('attend_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_trainer_attend_sessions');
    }
}
