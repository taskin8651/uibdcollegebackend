<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\AdministrativeOfficial;
use App\Models\Department;
use App\Models\HomeHeroSection;
use App\Models\NoticeBoard;

class HomeController extends Controller
{
    public function index()
    {
        $homeHero = HomeHeroSection::where('status', 1)->first();

        $aboutPage = AboutPage::where('status', 1)->first();

        $administrativeOfficials = AdministrativeOfficial::where('status', 1)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $generalNotices = NoticeBoard::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $admissionNotices = NoticeBoard::where('status', 1)
            ->where(function ($query) {
                $query->where('notice_type', 'like', '%admission%')
                    ->orWhere('heading', 'like', '%admission%');
            })
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $examNotices = NoticeBoard::where('status', 1)
            ->where(function ($query) {
                $query->where('notice_type', 'like', '%exam%')
                    ->orWhere('notice_type', 'like', '%examination%')
                    ->orWhere('heading', 'like', '%exam%')
                    ->orWhere('heading', 'like', '%examination%');
            })
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $iqacNotices = NoticeBoard::where('status', 1)
            ->where(function ($query) {
                $query->where('notice_type', 'like', '%iqac%')
                    ->orWhere('heading', 'like', '%iqac%');
            })
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit(4)
            ->get();

        $priorityNotices = NoticeBoard::where('status', 1)
            ->orderBy('sort_order')
            ->orderByDesc('publish_date')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        $academicCards = collect([
            [
                'icon' => 'bi bi-mortarboard',
                'title' => 'Courses Offered',
                'description' => 'UG, PG, vocational and professional programme details.',
                'url' => route('frontend.academic'),
                'button' => 'View Courses',
            ],
            [
                'icon' => 'bi bi-calendar2-week',
                'title' => 'Academic Calendar',
                'description' => 'Session-wise academic calendar, important dates and schedules.',
                'url' => route('frontend.academic'),
                'button' => 'View Calendar',
            ],
            [
                'icon' => 'bi bi-file-earmark-text',
                'title' => 'Syllabus',
                'description' => 'Course-wise and subject-wise syllabus PDFs for students.',
                'url' => route('frontend.syllabus-downloads'),
                'button' => 'View Syllabus',
            ],
            [
                'icon' => 'bi bi-table',
                'title' => 'Time Table',
                'description' => 'Class, department and examination timetable updates.',
                'url' => route('frontend.academic'),
                'button' => 'View Time Table',
            ],
            [
                'icon' => 'bi bi-link-45deg',
                'title' => 'University Guidelines',
                'description' => 'Useful links to PPU and official academic documents.',
                'url' => route('frontend.academic'),
                'button' => 'View Guidelines',
            ],
            [
                'icon' => 'bi bi-card-checklist',
                'title' => 'Programme Details',
                'description' => 'Eligibility, duration, seats, fee and admission process.',
                'url' => route('frontend.academic'),
                'button' => 'View Details',
            ],
        ]);

        $departments = Department::with('category')
            ->where('status', 1)
            ->whereHas('category', function ($query) {
                $query->where('status', 1);
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->limit(12)
            ->get();

        return view('frontend.index', compact(
            'homeHero',
            'aboutPage',
            'administrativeOfficials',
            'generalNotices',
            'admissionNotices',
            'examNotices',
            'iqacNotices',
            'priorityNotices',
            'academicCards',
            'departments'
        ));
    }
}