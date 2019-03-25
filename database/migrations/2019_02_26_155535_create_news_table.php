<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->longText('description');
            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('tags_id')->nullable();
            $table->unsignedInteger('clubs_id')->nullable();
            /*$table->foreign('tag_id')->references('tag_id')->on('tags')->nullable();*/
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
        Schema::dropIfExists('news');
    }
}
