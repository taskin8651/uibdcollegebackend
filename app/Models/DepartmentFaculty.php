<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DepartmentFaculty extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'department_id',
        'name',
        'designation',
        'qualification',
        'specialization',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('faculty_image')->singleFile();
    }
}