<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSchoolActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post_school_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->string('activity_name');
            $table->string('grade');
            $table->string('total_session');
            $table->string('timing');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('weekdays');
            $table->string('added_by');
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
        Schema::dropIfExists('tbl_post_school_activity');
    }
}
