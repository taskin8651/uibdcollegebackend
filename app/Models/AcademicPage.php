<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AcademicPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'academic_pages';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('overview_image')
            ->singleFile();
    }
}