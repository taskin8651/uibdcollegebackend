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