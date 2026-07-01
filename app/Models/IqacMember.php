<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IqacMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'iqac_role',
        'role_class',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}