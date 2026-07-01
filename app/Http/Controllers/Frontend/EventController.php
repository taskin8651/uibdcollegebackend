<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CollegeEvent;

class EventController extends Controller
{
    public function index()
    {
        $collegeEvents = CollegeEvent::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->get();

        return view('frontend.events', compact('collegeEvents'));
    }

    public function show(CollegeEvent $collegeEvent)
    {
        abort_if(!$collegeEvent->status, 404);

        $relatedEvents = CollegeEvent::where('status', 1)
            ->where('id', '!=', $collegeEvent->id)
            ->orderBy('sort_order')
            ->orderByDesc('event_date')
            ->limit(4)
            ->get();

        return view('frontend.event-detail', compact(
            'collegeEvent',
            'relatedEvents'
        ));
    }
}