<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicPagesTable extends Migration
{
    public function up()
    {
        Schema::create('academic_pages', function (Blueprint $table) {
            $table->id();

            $table->string('overview_title')->nullable();
            $table->longText('overview_description_one')->nullable();
            $table->longText('overview_description_two')->nullable();

            $table->string('overview_point_one')->nullable();
            $table->string('overview_point_two')->nullable();
            $table->string('overview_point_three')->nullable();
            $table->string('overview_point_four')->nullable();
            $table->string('overview_point_five')->nullable();
            $table->string('overview_point_six')->nullable();

            $table->string('courses_section_title')->nullable();
            $table->longText('courses_section_description')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_pages');
    }
}