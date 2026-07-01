<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'query_type',
        'subject',
        'message',
        'is_read',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}