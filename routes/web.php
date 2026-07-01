<?php

Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/about-us', 'Frontend\AboutController@index')->name('frontend.about');
Route::get('/academics', 'Frontend\AcademicController@index')->name('frontend.academic');
Route::get('/administration', 'Frontend\AdministrationController@index')->name('frontend.administration');

Route::get('/departments', 'Frontend\DepartmentController@index')->name('frontend.departments');
Route::get('/departments/{department}', 'Frontend\DepartmentController@show')->name('frontend.departments.show');

Route::get('/extension-activities', 'Frontend\ExtensionActivityController@index')->name('frontend.extension-activities');
Route::get('/extension-activities/{extensionActivity}', 'Frontend\ExtensionActivityController@show')->name('frontend.extension-activities.show');

Route::get('/iqac', 'Frontend\IqacController@index')->name('frontend.iqac');
Route::get('/iqac-members', 'Frontend\IqacMemberController@index')->name('frontend.iqac-members');

Route::get('/iqac-reports', 'Frontend\IqacReportController@index')->name('frontend.iqac-reports');

Route::get('/nirf', 'Frontend\NirfController@index')->name('frontend.nirf');
Route::get('/nirf-reports', 'Frontend\NirfReportController@index')->name('frontend.nirf-report');

Route::get('/notice', 'Frontend\NoticeController@index')->name('frontend.notice');
Route::get('/notice/{noticeBoard}', 'Frontend\NoticeController@show')->name('frontend.notice.show');

Route::get('/events', 'Frontend\EventController@index')->name('frontend.events');
Route::get('/events/{collegeEvent}', 'Frontend\EventController@show')->name('frontend.events.show');

Route::get('/tenders', 'Frontend\TenderController@index')->name('frontend.tenders');

Route::get('/student-feedback', 'Frontend\StudentFeedbackController@index')->name('frontend.student-feedback');
Route::post('/student-feedback', 'Frontend\StudentFeedbackController@store')->name('frontend.student-feedback.store');
Route::get('/teacher-feedback', 'Frontend\TeacherFeedbackController@index')->name('frontend.teacher-feedback');
Route::post('/teacher-feedback', 'Frontend\TeacherFeedbackController@store')->name('frontend.teacher-feedback.store');
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);


    /*
    |--------------------------------------------------------------------------
    | About Page CMS
    |--------------------------------------------------------------------------
    */

    Route::get('about-page', 'AboutPageController@edit')->name('about-page.edit');
    Route::put('about-page', 'AboutPageController@update')->name('about-page.update');
// About Journeys
Route::delete('about-journeys/destroy', 'AboutJourneysController@massDestroy')->name('about-journeys.massDestroy');
Route::resource('about-journeys', 'AboutJourneysController');

// Academic Page CMS
Route::get('academic-page', 'AcademicPageController@edit')->name('academic-page.edit');
Route::put('academic-page', 'AcademicPageController@update')->name('academic-page.update');

// Academic Courses
Route::delete('academic-courses/destroy', 'AcademicCoursesController@massDestroy')->name('academic-courses.massDestroy');
Route::resource('academic-courses', 'AcademicCoursesController');

// Digital Initiatives
Route::delete('digital-initiatives/destroy', 'DigitalInitiativesController@massDestroy')->name('digital-initiatives.massDestroy');
Route::resource('digital-initiatives', 'DigitalInitiativesController');

// Holiday Calendars
Route::delete('holiday-calendars/destroy', 'HolidayCalendarsController@massDestroy')->name('holiday-calendars.massDestroy');
Route::resource('holiday-calendars', 'HolidayCalendarsController');

// Principal Histories
Route::delete('principal-histories/destroy', 'PrincipalHistoriesController@massDestroy')->name('principal-histories.massDestroy');
Route::resource('principal-histories', 'PrincipalHistoriesController');

Route::delete('staff-downloads/destroy', 'StaffDownloadsController@massDestroy')->name('staff-downloads.massDestroy');
Route::resource('staff-downloads', 'StaffDownloadsController');

Route::delete('administration-galleries/destroy', 'AdministrationGalleriesController@massDestroy')->name('administration-galleries.massDestroy');
Route::resource('administration-galleries', 'AdministrationGalleriesController');


// Department Page CMS
Route::get('department-page', 'DepartmentPageController@edit')->name('department-page.edit');
Route::put('department-page', 'DepartmentPageController@update')->name('department-page.update');

// Department Categories
Route::delete('department-categories/destroy', 'DepartmentCategoriesController@massDestroy')->name('department-categories.massDestroy');
Route::resource('department-categories', 'DepartmentCategoriesController');

// Departments
Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
Route::resource('departments', 'DepartmentsController');

// Department Faculties
Route::delete('department-faculties/destroy', 'DepartmentFacultiesController@massDestroy')->name('department-faculties.massDestroy');
Route::resource('department-faculties', 'DepartmentFacultiesController');

// Department Resources
Route::delete('department-resources/destroy', 'DepartmentResourcesController@massDestroy')->name('department-resources.massDestroy');
Route::resource('department-resources', 'DepartmentResourcesController');

// Department Notices
Route::delete('department-notices/destroy', 'DepartmentNoticesController@massDestroy')->name('department-notices.massDestroy');
Route::resource('department-notices', 'DepartmentNoticesController');

Route::delete('extension-activities/destroy', 'ExtensionActivitiesController@massDestroy')->name('extension-activities.massDestroy');
Route::resource('extension-activities', 'ExtensionActivitiesController');

Route::delete('extension-activity-points/destroy', 'ExtensionActivityPointsController@massDestroy')->name('extension-activity-points.massDestroy');
Route::resource('extension-activity-points', 'ExtensionActivityPointsController');

Route::delete('extension-activity-objectives/destroy', 'ExtensionActivityObjectivesController@massDestroy')->name('extension-activity-objectives.massDestroy');
Route::resource('extension-activity-objectives', 'ExtensionActivityObjectivesController');

Route::delete('extension-activity-events/destroy', 'ExtensionActivityEventsController@massDestroy')->name('extension-activity-events.massDestroy');
Route::resource('extension-activity-events', 'ExtensionActivityEventsController');

Route::get('iqac-page', 'IqacPageController@edit')->name('iqac-page.edit');
Route::put('iqac-page', 'IqacPageController@update')->name('iqac-page.update');

Route::delete('iqac-members/destroy', 'IqacMembersController@massDestroy')->name('iqac-members.massDestroy');
Route::resource('iqac-members', 'IqacMembersController');

Route::delete('iqac-documents/destroy', 'IqacDocumentsController@massDestroy')->name('iqac-documents.massDestroy');
Route::resource('iqac-documents', 'IqacDocumentsController');

Route::delete('nirf-reports/destroy', 'NirfReportsController@massDestroy')->name('nirf-reports.massDestroy');
Route::resource('nirf-reports', 'NirfReportsController');

Route::delete('notice-boards/destroy', 'NoticeBoardsController@massDestroy')->name('notice-boards.massDestroy');
Route::resource('notice-boards', 'NoticeBoardsController');

Route::delete('college-events/destroy', 'CollegeEventsController@massDestroy')->name('college-events.massDestroy');
Route::resource('college-events', 'CollegeEventsController');

Route::delete('tender-notices/destroy', 'TenderNoticesController@massDestroy')->name('tender-notices.massDestroy');
Route::resource('tender-notices', 'TenderNoticesController');

Route::delete('student-feedback/destroy', 'StudentFeedbackController@massDestroy')->name('student-feedback.massDestroy');
Route::resource('student-feedback', 'StudentFeedbackController')->only(['index', 'show', 'destroy']);

Route::delete('teacher-feedback/destroy', 'TeacherFeedbackController@massDestroy')->name('teacher-feedback.massDestroy');
Route::resource('teacher-feedback', 'TeacherFeedbackController')->only(['index', 'show', 'destroy']);
});


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {

    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }

});
