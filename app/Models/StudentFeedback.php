<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentFeedback extends Model
{
    protected $table = 'student_feedback';

    protected $fillable = [
        'class_type',
        'department',
        'semester',
        'session',
        'roll_no',
        'student_name',
        'mobile',
        'email',
        'feedback_purpose',
        'qa1',
        'qa2',
        'qa3',
        'qb1',
        'qb2',
        'qb3',
        'qc1',
        'qc2',
        'qc3',
        'qd1',
        'qd2',
        'qd3',
        'qd4',
        'qd5',
        'qe1',
        'qe2',
        'qe3',
        'qf1',
        'qf2',
        'qf3',
        'qf4',
        'qf5',
        'qf6',
        'qf7',
        'qf8',
        'qf9',
        'qf10',
        'qf11',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];
}