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
        Schema::create('departments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('department_category_id')->nullable()->constrained('department_categories')->nullOnDelete();

    $table->string('name')->nullable();
    $table->string('slug')->nullable()->unique();
    $table->string('class_level')->nullable(); // UG, PG, UG & PG
    $table->string('badge_type')->default('ug'); // ug, pg, ug_pg, common
    $table->string('icon_class')->nullable();
    $table->string('short_description')->nullable();

    $table->longText('description_one')->nullable();
    $table->longText('description_two')->nullable();

    $table->integer('sort_order')->default(0);
    $table->boolean('status')->default(1);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
