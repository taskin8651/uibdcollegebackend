<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrincipalHistory extends Model
{
    protected $table = 'principal_histories';

    protected $fillable = [
        'name',
        'designation',
        'badge_type',
        'from_date',
        'to_date',
        'to_date_label',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date'   => 'date',
        'status'    => 'boolean',
    ];
}