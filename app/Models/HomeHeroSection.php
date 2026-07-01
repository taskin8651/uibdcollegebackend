<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HomeHeroSection extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'lead_text',
        'notice_button_label',
        'notice_button_url',
        'admission_button_label',
        'admission_button_url',
        'download_button_label',
        'download_button_url',
        'total_students',
        'male_students',
        'female_students',
        'programmes_value',
        'programmes_label',
        'naac_value',
        'naac_label',
        'aishe_value',
        'aishe_label',
        'media_card_one_text',
        'media_card_two_text',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_image')->singleFile();
    }
}