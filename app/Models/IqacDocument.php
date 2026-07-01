<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class IqacDocument extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'document_type',
        'title',
        'subtitle',
        'aqar_year',
        'particular',
        'icon_class',
        'file_type',
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
        $this->addMediaCollection('iqac_file')->singleFile();
    }
}