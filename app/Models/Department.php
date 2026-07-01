<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Department extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'department_category_id',
        'name',
        'slug',
        'class_level',
        'badge_type',
        'icon_class',
        'short_description',
        'description_one',
        'description_two',
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

        static::saving(function ($department) {
            if (!$department->slug && $department->name) {
                $department->slug = Str::slug($department->name);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(DepartmentCategory::class, 'department_category_id');
    }

    public function faculties()
    {
        return $this->hasMany(DepartmentFaculty::class);
    }

    public function resources()
    {
        return $this->hasMany(DepartmentResource::class);
    }

    public function notices()
    {
        return $this->hasMany(DepartmentNotice::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('department_image')->singleFile();
    }
}