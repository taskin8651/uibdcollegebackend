<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WebsiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'site_title',
        'college_name',
        'college_name_hindi',
        'meta_description',
        'meta_keywords',
        'affiliation_text',
        'aishe_code',
        'naac_text',
        'address',
        'phone',
        'alternate_phone',
        'email',
        'admission_url',
        'map_embed_url',
        'map_direction_url',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'linkedin_url',
        'whatsapp_url',
        'og_title',
        'og_description',
        'created_at',
        'updated_at',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('header_logo')->singleFile();
        $this->addMediaCollection('university_logo')->singleFile();
        $this->addMediaCollection('footer_logo')->singleFile();
        $this->addMediaCollection('favicon')->singleFile();
        $this->addMediaCollection('og_image')->singleFile();
    }

    public function mediaUrl(string $collection, string $fallback): string
    {
        return $this->getFirstMediaUrl($collection) ?: asset($fallback);
    }
}
