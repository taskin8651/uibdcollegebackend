<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HolidayCalendar extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'holiday_calendars';

    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
        'update_date' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('holiday_file')
            ->singleFile();
    }
}