<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class NoticeBoard extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'notice_type',
        'heading',
        'slug',
        'details',
        'description',
        'publish_date',
        'expire_date',
        'document_title',
        'document_subtitle',
        'instructions',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'expire_date'  => 'date',
        'status'       => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($notice) {
            if (!$notice->slug && $notice->heading) {
                $notice->slug = Str::slug($notice->heading . '-' . time());
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('notice_file')->singleFile();
    }
}