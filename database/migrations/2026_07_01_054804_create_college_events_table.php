<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeEventsTable extends Migration
{
    public function up()
    {
        Schema::create('college_events', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();

            $table->date('event_date')->nullable();
            $table->string('location')->nullable();
            $table->string('organizer')->nullable();

            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->longText('instructions')->nullable();

            $table->string('button_label')->nullable();

            $table->string('document_title')->nullable();
            $table->string('document_subtitle')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('college_events');
    }
}