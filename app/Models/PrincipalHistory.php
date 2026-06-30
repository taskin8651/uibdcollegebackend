<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrincipalHistory extends Model
{
    protected $table = 'principal_histories';

    protected $guarded = [];

    protected $casts = [
        'from_date' => 'date',
        'to_date'   => 'date',
        'status'    => 'boolean',
    ];
}