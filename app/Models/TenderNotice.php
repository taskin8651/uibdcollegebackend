<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TenderNotice extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'publish_date' => 'date',
        'expire_date'  => 'date',
        'status'       => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tender_file')->singleFile();
    }
}