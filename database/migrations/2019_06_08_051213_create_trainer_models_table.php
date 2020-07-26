<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trainer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trainer_id');
            $table->string('name');
            $table->string('education');
            $table->string('experience');
            $table->string('sport_achievement');
            $table->string('primary_game');
            $table->string('last_employee');
            $table->string('email');
            $table->string('contact');
            $table->string('password');
            $table->string('address');
            $table->string('profile_photo');
            $table->string('resume');
            $table->string('isdelete');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('tbl_trainer');
    }
}
