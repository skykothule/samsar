<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYearlyTimeTableTotalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_yearly_time_table_total_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yearly_data_id');
            $table->string('day');
            $table->string('class');
            $table->string('sport_name');
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
        Schema::dropIfExists('tbl_yearly_time_table_total_data');
    }
}
