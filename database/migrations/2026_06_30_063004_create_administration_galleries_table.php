<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('administration_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('gallery'); // gallery, media
            $table->string('title')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_big')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administration_galleries');
    }
}