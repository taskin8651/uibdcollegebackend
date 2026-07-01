<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_card_title',
        'hero_card_subtitle',
        'history_title',
        'history_description_one',
        'history_description_two',
        'history_point_one',
        'history_point_two',
        'history_point_three',
        'history_point_four',
        'founder_title',
        'founder_description_one',
        'founder_description_two',
        'founder_quote',
        'legacy_card_title',
        'legacy_card_description',
        'legacy_point_one',
        'legacy_point_two',
        'legacy_point_three',
        'legacy_point_four',
        'vision_section_title',
        'vision_one_icon',
        'vision_one_title',
        'vision_one_description',
        'vision_two_icon',
        'vision_two_title',
        'vision_two_description',
        'vision_three_icon',
        'vision_three_title',
        'vision_three_description',
        'academic_title',
        'academic_description',
        'academic_point_one',
        'academic_point_two',
        'academic_point_three',
        'academic_point_four',
        'academic_point_five',
        'academic_point_six',
        'principal_title',
        'principal_description_one',
        'principal_description_two',
        'values_title',
        'values_description',
        'value_chip_one',
        'value_chip_two',
        'value_chip_three',
        'value_chip_four',
        'value_chip_five',
        'value_chip_six',
        'value_chip_seven',
        'value_chip_eight',
        'value_card_one_icon',
        'value_card_one_title',
        'value_card_one_text',
        'value_card_two_icon',
        'value_card_two_title',
        'value_card_two_text',
        'value_card_three_icon',
        'value_card_three_title',
        'value_card_three_text',
        'value_card_four_icon',
        'value_card_four_title',
        'value_card_four_text',
        'status',
        'created_at',
        'updated_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_logo')->singleFile();
        $this->addMediaCollection('founder_image')->singleFile();
        $this->addMediaCollection('academic_image')->singleFile();
        $this->addMediaCollection('principal_image')->singleFile();
    }
}