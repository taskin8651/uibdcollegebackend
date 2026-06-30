<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayCalendarsTable extends Migration
{
    public function up()
    {
        Schema::create('holiday_calendars', function (Blueprint $table) {
            $table->id();
            $table->string('year_label')->nullable();
            $table->string('title')->nullable();
            $table->dateTime('update_date')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('holiday_calendars');
    }
}