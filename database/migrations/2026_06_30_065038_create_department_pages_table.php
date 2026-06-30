<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_pages', function (Blueprint $table) {
    $table->id();
    $table->string('hero_title')->nullable();
    $table->longText('hero_description')->nullable();

    $table->string('overview_title')->nullable();
    $table->longText('overview_description_one')->nullable();
    $table->longText('overview_description_two')->nullable();

    $table->string('overview_point_one')->nullable();
    $table->string('overview_point_two')->nullable();
    $table->string('overview_point_three')->nullable();
    $table->string('overview_point_four')->nullable();
    $table->string('overview_point_five')->nullable();
    $table->string('overview_point_six')->nullable();

    $table->boolean('status')->default(1);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_pages');
    }
};
