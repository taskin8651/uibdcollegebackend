<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ExtensionActivity extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'icon_class',
        'short_description',
        'hero_label',
        'hero_title',
        'hero_description',
        'card_title',
        'card_subtitle',
        'pill_one',
        'pill_two',
        'pill_three',
        'about_kicker',
        'about_title',
        'about_description_one',
        'about_description_two',
        'objectives_title',
        'events_title',
        'join_kicker',
        'join_title',
        'join_description',
        'contact_email',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

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