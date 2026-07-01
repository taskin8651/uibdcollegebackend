<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherFeedback extends Model
{
    protected $table = 'teacher_feedback';

    protected $fillable = [
        'teacher_name',
        'department',
        'designation',
        'mobile',
        'email',
        'session',
        'qa1',
        'qa2',
        'qa3',
        'qb1',
        'qb2',
        'qb3',
        'qc1',
        'qc2',
        'qc3',
        'suggestions',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];
}
