<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtensionActivityObjective extends Model
{
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function extensionActivity()
    {
        return $this->belongsTo(ExtensionActivity::class);
    }
}