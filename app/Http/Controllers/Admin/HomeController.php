<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutJourney;
use App\Models\AboutPage;
use App\Models\AcademicCourse;
use App\Models\AcademicPage;
use App\Models\AdministrationGallery;
use App\Models\AuditLog;
use App\Models\CollegeEvent;
use App\Models\ContactEnquiry;
use App\Models\Department;
use App\Models\DepartmentCategory;
use App\Models\DepartmentFaculty;
use App\Models\DepartmentNotice;
use App\Models\DepartmentPage;
use App\Models\DepartmentResource;
use App\Models\DigitalInitiative;
use App\Models\ExtensionActivity;
use App\Models\ExtensionActivityEvent;
use App\Models\ExtensionActivityObjective;
use App\Models\ExtensionActivityPoint;
use App\Models\HolidayCalendar;
use App\Models\IqacDocument;
use App\Models\IqacMember;
use App\Models\IqacPage;
use App\Models\NirfReport;
use App\Models\NoticeBoard;
use App\Models\Permission;
use App\Models\PrincipalHistory;
use App\Models\Role;
use App\Models\StaffDownload;
use App\Models\StudentFeedback;
use App\Models\TeacherFeedback;
use App\Models\TenderNotice;
use App\Models\User;
use App\Models\WebsiteSetting;
use Carbon\Carbon;

class HomeController
{
    public function index()
    {
        $today = Carbon::today();

        $contentModules = [
            ['label' => 'Notices', 'count' => NoticeBoard::count(), 'icon' => 'fa-bullhorn', 'route' => 'admin.notice-boards.index', 'color' => '#2563EB'],
            ['label' => 'Events', 'count' => CollegeEvent::count(), 'icon' => 'fa-calendar-alt', 'route' => 'admin.college-events.index', 'color' => '#7C3AED'],
            ['label' => 'Departments', 'count' => Department::count(), 'icon' => 'fa-building-columns', 'route' => 'admin.departments.index', 'color' => '#0891B2'],
            ['label' => 'Faculty', 'count' => DepartmentFaculty::count(), 'icon' => 'fa-chalkboard-user', 'route' => 'admin.department-faculties.index', 'color' => '#059669'],
            ['label' => 'Tender Notices', 'count' => TenderNotice::count(), 'icon' => 'fa-file-contract', 'route' => 'admin.tender-notices.index', 'color' => '#D97706'],
            ['label' => 'IQAC Documents', 'count' => IqacDocument::count(), 'icon' => 'fa-folder-open', 'route' => 'admin.iqac-documents.index', 'color' => '#DB2777'],
            ['label' => 'NIRF Reports', 'count' => NirfReport::count(), 'icon' => 'fa-chart-column', 'route' => 'admin.nirf-reports.index', 'color' => '#4F46E5'],
            ['label' => 'Staff Downloads', 'count' => StaffDownload::count(), 'icon' => 'fa-download', 'route' => 'admin.staff-downloads.index', 'color' => '#EA580C'],
        ];

        $supportModules = [
            ['label' => 'Student Feedback', 'count' => StudentFeedback::count(), 'route' => 'admin.student-feedback.index', 'color' => '#2563EB'],
            ['label' => 'Teacher Feedback', 'count' => TeacherFeedback::count(), 'route' => 'admin.teacher-feedback.index', 'color' => '#7C3AED'],
            ['label' => 'Contact Enquiries', 'count' => ContactEnquiry::count(), 'route' => 'admin.contact-enquiries.index', 'color' => '#059669'],
        ];

        $cmsModules = [
            ['label' => 'Academic Courses', 'count' => AcademicCourse::count(), 'route' => 'admin.academic-courses.index'],
            ['label' => 'About Journeys', 'count' => AboutJourney::count(), 'route' => 'admin.about-journeys.index'],
            ['label' => 'About Page', 'count' => AboutPage::count(), 'route' => 'admin.about-page.edit'],
            ['label' => 'Academic Page', 'count' => AcademicPage::count(), 'route' => 'admin.academic-page.edit'],
            ['label' => 'Principal Histories', 'count' => PrincipalHistory::count(), 'route' => 'admin.principal-histories.index'],
            ['label' => 'Holiday Calendars', 'count' => HolidayCalendar::count(), 'route' => 'admin.holiday-calendars.index'],
            ['label' => 'Digital Initiatives', 'count' => DigitalInitiative::count(), 'route' => 'admin.digital-initiatives.index'],
            ['label' => 'Admin Galleries', 'count' => AdministrationGallery::count(), 'route' => 'admin.administration-galleries.index'],
            ['label' => 'Department Categories', 'count' => DepartmentCategory::count(), 'route' => 'admin.department-categories.index'],
            ['label' => 'Department Page', 'count' => DepartmentPage::count(), 'route' => 'admin.department-page.edit'],
            ['label' => 'Department Notices', 'count' => DepartmentNotice::count(), 'route' => 'admin.department-notices.index'],
            ['label' => 'Department Resources', 'count' => DepartmentResource::count(), 'route' => 'admin.department-resources.index'],
            ['label' => 'Extension Activities', 'count' => ExtensionActivity::count(), 'route' => 'admin.extension-activities.index'],
            ['label' => 'Extension Events', 'count' => ExtensionActivityEvent::count(), 'route' => 'admin.extension-activity-events.index'],
            ['label' => 'Extension Objectives', 'count' => ExtensionActivityObjective::count(), 'route' => 'admin.extension-activity-objectives.index'],
            ['label' => 'Extension Points', 'count' => ExtensionActivityPoint::count(), 'route' => 'admin.extension-activity-points.index'],
            ['label' => 'IQAC Page', 'count' => IqacPage::count(), 'route' => 'admin.iqac-page.edit'],
            ['label' => 'IQAC Members', 'count' => IqacMember::count(), 'route' => 'admin.iqac-members.index'],
            ['label' => 'Website Settings', 'count' => WebsiteSetting::count(), 'route' => 'admin.website-settings.edit'],
        ];

        $userStats = [
            'users' => User::count(),
            'roles' => Role::count(),
            'permissions' => Permission::count(),
            'audit_logs' => AuditLog::count(),
            'today_users' => User::whereDate('created_at', $today)->count(),
            'today_enquiries' => ContactEnquiry::whereDate('created_at', $today)->count(),
            'today_feedback' => StudentFeedback::whereDate('created_at', $today)->count() + TeacherFeedback::whereDate('created_at', $today)->count(),
        ];

        $recentUsers = User::with('roles')->latest()->take(5)->get();
        $recentNotices = NoticeBoard::latest()->take(5)->get();
        $recentEnquiries = ContactEnquiry::latest()->take(5)->get();
        $recentLogs = AuditLog::latest()->take(6)->get();
        $websiteSetting = WebsiteSetting::first();

        return view('home', compact(
            'contentModules',
            'supportModules',
            'cmsModules',
            'userStats',
            'recentUsers',
            'recentNotices',
            'recentEnquiries',
            'recentLogs',
            'websiteSetting'
        ));
    }
}
