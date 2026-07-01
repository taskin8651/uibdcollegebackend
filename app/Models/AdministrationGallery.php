<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AdministrationGallery extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'administration_galleries';

    protected $fillable = [
        'type',
        'title',
        'alt_text',
        'url',
        'sort_order',
        'is_big',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_big' => 'boolean',
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}