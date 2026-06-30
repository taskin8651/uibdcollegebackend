<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicCourse;
use App\Models\AcademicPage;
use App\Models\DigitalInitiative;
use App\Models\HolidayCalendar;

class AcademicController extends Controller
{
    public function index()
    {
        $academicPage = AcademicPage::where('status', 1)->first();

        if (!$academicPage) {
            abort(404);
        }

        $academicCourses = AcademicCourse::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $digitalInitiatives = DigitalInitiative::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
        $holidayCalendars = HolidayCalendar::where('status', 1)
    ->orderBy('sort_order')
    ->orderByDesc('id')
    ->get();    

        return view('frontend.academic', compact(
            'academicPage',
            'academicCourses',
            'digitalInitiatives',
            'holidayCalendars'
        ));
    }
}