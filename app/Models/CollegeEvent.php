<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class CollegeEvent extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'event_date' => 'date',
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($event) {
            if (!$event->slug && $event->title) {
                $event->slug = Str::slug($event->title . '-' . time());
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('event_file')->singleFile();
        $this->addMediaCollection('event_image')->singleFile();
    }
}