<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNirfReportsTable extends Migration
{
    public function up()
    {
        Schema::create('nirf_reports', function (Blueprint $table) {
            $table->id();

            $table->string('heading')->nullable();
            $table->longText('description')->nullable();

            $table->string('publish_year')->nullable();
            $table->date('publish_date')->nullable();

            $table->string('badge_label')->nullable(); // 2026, 2025, Archive
            $table->string('badge_class')->nullable(); // normal, muted

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nirf_reports');
    }
}