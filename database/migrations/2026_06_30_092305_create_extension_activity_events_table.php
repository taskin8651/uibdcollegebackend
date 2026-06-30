<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtensionActivityEventsTable extends Migration
{
    public function up()
    {
        Schema::create('extension_activity_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('extension_activity_id')
                ->nullable()
                ->constrained('extension_activities')
                ->nullOnDelete();

            $table->string('icon_class')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extension_activity_events');
    }
}