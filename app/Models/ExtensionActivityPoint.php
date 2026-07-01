<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtensionActivityPoint extends Model
{
    protected $fillable = [
        'extension_activity_id',
        'title',
        'sort_order',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function extensionActivity()
    {
        return $this->belongsTo(ExtensionActivity::class);
    }
}