<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_parent_feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('parent_id');
            $table->integer('feedback');
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
        Schema::dropIfExists('tbl_parent_feedback');
    }
}
