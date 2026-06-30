<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIqacPagesTable extends Migration
{
    public function up()
    {
        Schema::create('iqac_pages', function (Blueprint $table) {
            $table->id();

            $table->string('intro_kicker')->nullable();
            $table->string('intro_title')->nullable();
            $table->longText('intro_description_one')->nullable();
            $table->longText('intro_description_two')->nullable();

            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->string('point_four')->nullable();
            $table->string('point_five')->nullable();
            $table->string('point_six')->nullable();

            $table->string('vision_icon')->nullable();
            $table->string('vision_title')->nullable();
            $table->longText('vision_description')->nullable();

            $table->string('mission_icon')->nullable();
            $table->string('mission_title')->nullable();
            $table->longText('mission_description')->nullable();

            $table->string('quality_icon')->nullable();
            $table->string('quality_title')->nullable();
            $table->longText('quality_description')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iqac_pages');
    }
}