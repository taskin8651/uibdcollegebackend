<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AcademicPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'academic_pages';

    protected $fillable = [
        'overview_title',
        'overview_description_one',
        'overview_description_two',
        'overview_point_one',
        'overview_point_two',
        'overview_point_three',
        'overview_point_four',
        'overview_point_five',
        'overview_point_six',
        'courses_section_title',
        'courses_section_description',
        'status',
        'created_at',
        'updated_at',
    ];

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