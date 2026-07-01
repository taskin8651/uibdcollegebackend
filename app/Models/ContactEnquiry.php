<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}