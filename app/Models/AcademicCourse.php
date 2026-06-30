<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCourse extends Model
{
    protected $table = 'academic_courses';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];
}