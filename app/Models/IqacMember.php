<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IqacMember extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];
}