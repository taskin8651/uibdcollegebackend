<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalInitiative extends Model
{
    protected $table = 'digital_initiatives';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];
}