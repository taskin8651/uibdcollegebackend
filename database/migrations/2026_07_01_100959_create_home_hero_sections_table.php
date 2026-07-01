<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeHeroSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('home_hero_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->longText('lead_text')->nullable();

            $table->string('notice_button_label')->nullable();
            $table->string('notice_button_url')->nullable();

            $table->string('admission_button_label')->nullable();
            $table->string('admission_button_url')->nullable();

            $table->string('download_button_label')->nullable();
            $table->string('download_button_url')->nullable();

            $table->integer('total_students')->nullable();
            $table->integer('male_students')->nullable();
            $table->integer('female_students')->nullable();

            $table->string('programmes_value')->nullable();
            $table->string('programmes_label')->nullable();

            $table->string('naac_value')->nullable();
            $table->string('naac_label')->nullable();

            $table->string('aishe_value')->nullable();
            $table->string('aishe_label')->nullable();

            $table->string('media_card_one_text')->nullable();
            $table->string('media_card_two_text')->nullable();

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_hero_sections');
    }
}