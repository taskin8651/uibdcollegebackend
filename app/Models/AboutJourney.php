<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutJourney extends Model
{
    protected $table = 'about_journeys';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];
}