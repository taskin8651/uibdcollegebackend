<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtensionActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('extension_activities', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('icon_class')->nullable();
            $table->longText('short_description')->nullable();

            $table->string('hero_label')->nullable();
            $table->string('hero_title')->nullable();
            $table->longText('hero_description')->nullable();

            $table->string('card_title')->nullable();
            $table->string('card_subtitle')->nullable();

            $table->string('pill_one')->nullable();
            $table->string('pill_two')->nullable();
            $table->string('pill_three')->nullable();

            $table->string('about_kicker')->nullable();
            $table->string('about_title')->nullable();
            $table->longText('about_description_one')->nullable();
            $table->longText('about_description_two')->nullable();

            $table->string('objectives_title')->nullable();
            $table->string('events_title')->nullable();

            $table->string('join_kicker')->nullable();
            $table->string('join_title')->nullable();
            $table->longText('join_description')->nullable();
            $table->string('contact_email')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extension_activities');
    }
}