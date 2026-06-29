<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_logo')->singleFile();
        $this->addMediaCollection('founder_image')->singleFile();
        $this->addMediaCollection('academic_image')->singleFile();
        $this->addMediaCollection('principal_image')->singleFile();
    }
}