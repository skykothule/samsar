<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_achievement', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('school_id');
            $table->integer('student_id');
            $table->string('competition_name');
            $table->string('rank');
            $table->string('competation_level');
            $table->string('year')->nullable();
            $table->integer('added_by')->nullable();
            $table->string('competation_pic')->nullable();
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
        Schema::dropIfExists('tbl_achievement');
    }
}
