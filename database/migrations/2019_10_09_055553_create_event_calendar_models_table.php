<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCalendarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('sub_event_name');
            $table->string('day');
            $table->date('date');
            $table->string('timing');
            $table->string('session');
            $table->string('venue');
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
        Schema::dropIfExists('tbl_event_calendar');
    }
}
