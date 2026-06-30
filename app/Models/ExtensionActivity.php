<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ExtensionActivity extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($activity) {
            if (!$activity->slug && $activity->title) {
                $activity->slug = Str::slug($activity->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function points()
    {
        return $this->hasMany(ExtensionActivityPoint::class);
    }

    public function objectives()
    {
        return $this->hasMany(ExtensionActivityObjective::class);
    }

    public function events()
    {
        return $this->hasMany(ExtensionActivityEvent::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('activity_image')->singleFile();
        $this->addMediaCollection('join_form')->singleFile();
    }
}