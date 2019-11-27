<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('start');
            $table->string('end');
            $table->string('location')->nullable();
            $table->text('content');
            $table->string('tag')->nullable();
            $table->string('club')->nullable();
            $table->string('committee')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('owner');
            $table->boolean('hidden')->default(0);
            $table->integer('hidden_by')->default(0);
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
        Schema::dropIfExists('events');
    }
}
