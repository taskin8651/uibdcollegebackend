<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class IqacPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'intro_kicker',
        'intro_title',
        'intro_description_one',
        'intro_description_two',
        'point_one',
        'point_two',
        'point_three',
        'point_four',
        'point_five',
        'point_six',
        'vision_icon',
        'vision_title',
        'vision_description',
        'mission_icon',
        'mission_title',
        'mission_description',
        'quality_icon',
        'quality_title',
        'quality_description',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('intro_image')->singleFile();
    }
}