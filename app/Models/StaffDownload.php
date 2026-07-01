<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StaffDownload extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'staff_downloads';

    protected $fillable = [
        'title',
        'subtitle',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('staff_file')->singleFile();
    }
}