<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutJourney extends Model
{
    protected $table = 'about_journeys';

    protected $fillable = [
        'year_label',
        'title',
        'description',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}