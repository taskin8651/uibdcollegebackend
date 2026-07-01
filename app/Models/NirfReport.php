<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class NirfReport extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'heading',
        'description',
        'publish_year',
        'publish_date',
        'badge_label',
        'badge_class',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('nirf_file')->singleFile();
    }
}