<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalInitiative extends Model
{
    protected $table = 'digital_initiatives';

    protected $fillable = [
        'icon_class',
        'title',
        'description',
        'url',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}