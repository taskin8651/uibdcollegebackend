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
        Schema::create('department_categories', function (Blueprint $table) {
    $table->id();
    $table->string('name')->nullable();
    $table->string('slug')->nullable()->unique();
    $table->string('icon_class')->nullable();
    $table->string('section_label')->nullable();
    $table->string('heading')->nullable();
    $table->longText('description')->nullable();
    $table->string('anchor_id')->nullable();
    $table->string('layout_type')->default('card'); // table, card, feature, professional, common
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
        Schema::dropIfExists('department_categories');
    }
};
