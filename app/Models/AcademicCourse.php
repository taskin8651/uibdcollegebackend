<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCourse extends Model
{
    protected $table = 'academic_courses';

    protected $fillable = [
        'icon_class',
        'title',
        'description',
        'tag_one',
        'tag_two',
        'tag_three',
        'tag_four',
        'tag_five',
        'tag_six',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}