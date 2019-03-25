<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->integer('uno')->nullable();
            $table->boolean('status')->default(true);
            $table->date('start_date')->nullable();
            $table->date('stop_date')->nullable();
            $table->longText('photo')->nullable();
            $table->unsignedInteger('positions_id')->nullable();
            $table->unsignedInteger('majors_id')->nullable();
            $table->unsignedInteger('years_en_id')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();           
            /*$table->foreign('student_pos')->references('position_id')->on('positions');
            $table->foreign('years_id')->references('years_id')->on('years_en');
            $table->foreign('majors_id')->references('majors_id')->on('students_en');*/
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
        Schema::dropIfExists('students');
    }
}
