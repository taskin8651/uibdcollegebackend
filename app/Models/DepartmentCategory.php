<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DepartmentCategory extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (!$category->slug && $category->name) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'department_category_id');
    }
}