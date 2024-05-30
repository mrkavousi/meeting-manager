<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions1', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location');
            $table->text('participants');
            $table->text('absentees')->nullable();
            $table->text('agenda');
            $table->text('summary');
            $table->text('actions');
            $table->text('follow_up_items');
            $table->string('next_meeting');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions1');
    }
}
