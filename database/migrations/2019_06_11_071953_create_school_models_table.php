<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_school', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('school_email');
            $table->string('school_contact');
            $table->string('school_password');
            $table->string('contact_person_name');
            $table->string('contact_person_no');
            $table->string('school_package');
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
        Schema::dropIfExists('tbl_school');
    }
}
