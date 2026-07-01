<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtensionActivityObjective extends Model
{
    protected $fillable = [
        'extension_activity_id',
        'icon_class',
        'title',
        'description',
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