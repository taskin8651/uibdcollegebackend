<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // HERO
            $table->string('hero_title')->nullable();
            $table->longText('hero_description')->nullable();
            $table->string('hero_card_title')->nullable();
            $table->string('hero_card_subtitle')->nullable();

            // BRIEF HISTORY
            $table->string('history_title')->nullable();
            $table->longText('history_description_one')->nullable();
            $table->longText('history_description_two')->nullable();

            $table->string('history_point_one')->nullable();
            $table->string('history_point_two')->nullable();
            $table->string('history_point_three')->nullable();
            $table->string('history_point_four')->nullable();

            // FOUNDER LEGACY
            $table->string('founder_title')->nullable();
            $table->longText('founder_description_one')->nullable();
            $table->longText('founder_description_two')->nullable();
            $table->longText('founder_quote')->nullable();

            $table->string('legacy_card_title')->nullable();
            $table->longText('legacy_card_description')->nullable();

            $table->string('legacy_point_one')->nullable();
            $table->string('legacy_point_two')->nullable();
            $table->string('legacy_point_three')->nullable();
            $table->string('legacy_point_four')->nullable();

            // VISION MISSION SECTION
            $table->string('vision_section_title')->nullable();

            $table->string('vision_one_icon')->nullable();
            $table->string('vision_one_title')->nullable();
            $table->longText('vision_one_description')->nullable();

            $table->string('vision_two_icon')->nullable();
            $table->string('vision_two_title')->nullable();
            $table->longText('vision_two_description')->nullable();

            $table->string('vision_three_icon')->nullable();
            $table->string('vision_three_title')->nullable();
            $table->longText('vision_three_description')->nullable();

            // ACADEMIC
            $table->string('academic_title')->nullable();
            $table->longText('academic_description')->nullable();

            $table->string('academic_point_one')->nullable();
            $table->string('academic_point_two')->nullable();
            $table->string('academic_point_three')->nullable();
            $table->string('academic_point_four')->nullable();
            $table->string('academic_point_five')->nullable();
            $table->string('academic_point_six')->nullable();

            // PRINCIPAL
            $table->string('principal_title')->nullable();
            $table->longText('principal_description_one')->nullable();
            $table->longText('principal_description_two')->nullable();

            // VALUES
            $table->string('values_title')->nullable();
            $table->longText('values_description')->nullable();

            $table->string('value_chip_one')->nullable();
            $table->string('value_chip_two')->nullable();
            $table->string('value_chip_three')->nullable();
            $table->string('value_chip_four')->nullable();
            $table->string('value_chip_five')->nullable();
            $table->string('value_chip_six')->nullable();
            $table->string('value_chip_seven')->nullable();
            $table->string('value_chip_eight')->nullable();

            $table->string('value_card_one_icon')->nullable();
            $table->string('value_card_one_title')->nullable();
            $table->string('value_card_one_text')->nullable();

            $table->string('value_card_two_icon')->nullable();
            $table->string('value_card_two_title')->nullable();
            $table->string('value_card_two_text')->nullable();

            $table->string('value_card_three_icon')->nullable();
            $table->string('value_card_three_title')->nullable();
            $table->string('value_card_three_text')->nullable();

            $table->string('value_card_four_icon')->nullable();
            $table->string('value_card_four_title')->nullable();
            $table->string('value_card_four_text')->nullable();

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};