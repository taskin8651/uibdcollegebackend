<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalInitiativesTable extends Migration
{
    public function up()
    {
        Schema::create('digital_initiatives', function (Blueprint $table) {
            $table->id();

            $table->string('icon_class')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('url')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('digital_initiatives');
    }
}