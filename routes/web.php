<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

//auth routes
// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/', function () {
    return view('welcome');
});
Route::get('index',function (){
    return view('backend/index');
});
/*
* Frontend Routes
* Namespaces indicate folder structure
*/
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'backend', 'prefix' => 'backend', 'as' => 'backend.', 'middleware' => ['auth']], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
//    includeRouteFiles(__DIR__.'/backend/');

    //these routes are accessible by super_admin only
    Route::group(['middleware=>role:super_admin'],function (){


    //permission and roles routes
    Route::get('roles','AccessController@viewRoles')->name('roles');
    Route::post('save_role_changes','AccessController@saveRoleChanges')->name('save_role_changes');
    Route::get('permissions','AccessController@viewPermissions')->name('permissions');
    Route::get('get_roles_permissions/{role_id}','AccessController@getRolesPermission');
    Route::get('delete_current_role_perm/{role_id}','AccessController@deleteRolePerm')->name('delete_current_role_perm');
    Route::post('save_new_role','AccessController@saveNewRolePerm')->name('save_new_role');
//    Route::get('save_new_role/{permission_id}/{role_id}','AccessController@saveNewRolePerm')->name('save_new_role');
    Route::post('save_permission_changes','AccessController@savePermissionChanges')->name('save_permission_changes');


    //users routes
    Route::get('users','UserController@index')->name('users');
    Route::get('all_users','UserController@allUsers')->name('all_users');
    Route::post('new_user','UserController@newUser')->name('new_user');


    //logs viewer
    Route::get('logs', 'LogsController@index')->name('logs');
//    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    //faculties routes
    Route::get('all_faculties','FacultyController@index')->name('all_faculties');
    Route::post('new_faculty','FacultyController@newFaculty')->name('new_faculty');

    //department routes
    Route::get('all_departments','DepartmentController@index')->name('all_departments');
    Route::post('new_department','DepartmentController@newDepartment')->name('new_department');
    Route::get('edit_department/{department_id}','DepartmentController@editDepartment');
    Route::get('faculties_for_department','DepartmentController@facultiesForDepartment');
    Route::get('delete_department/{department_id}','DepartmentController@deleteDepartment');

    //courses routes
    Route::get('all_courses_view','CourseController@index')->name('all_courses_view');
    Route::get('department_course','CourseController@allDepartments')->name('department_course');
    Route::post('new_course','CourseController@newCourse')->name('new_course');
    Route::get('all_courses','CourseController@allCourses')->name('all_courses');

    //academic years
    Route::get('all_academic_years','AcademicYearController@index')->name('all_academic_years');
    Route::post('new_academic_year','AcademicYearController@newAcademic')->name('new_academic_year');
    Route::get('academic_years','AcademicYearController@academicYears')->name('academic_years');


        //semester routes
        Route::get('all_semester_view','SemesterController@index')->name('all_semester_view');
        Route::get('academic_for_sem','SemesterController@academicSem')->name('academic_for_sem');
        Route::post('new_semester','SemesterController@newSemester');
        Route::get('semester_records_for_view','SemesterController@allSemRecords')->name('semester_records_for_view');
        Route::get('delete_semester/{sem_id}','SemesterController@deleteSemester')->name('delete_semester');

    });


});

Route::group(['middleware'=>'auth'],function (){


Route::get('typography',function (){
    return view('typography');
});
Route::get('helper_classes',function (){
    return view('helper_classes');
});

//widget
    //cards
Route::get('basic',function (){
    return view('widgets.cards.basic');
});
Route::get('colored',function (){
    return view('widgets.cards.colored');
});
Route::get('no_header',function (){
    return view('widgets.cards.no_header');
});

//infobox
Route::get('infobox_1',function (){
    return view('widgets.infobox.infobox_1');
});
Route::get('infobox_2',function (){
    return view('widgets.infobox.infobox_2');
});
Route::get('infobox_3',function (){
    return view('widgets.infobox.infobox_3');
});
Route::get('infobox_4',function (){
    return view('widgets.infobox.infobox_4');
});
Route::get('infobox_5',function (){
    return view('widgets.infobox.infobox_5');
});

//UI
Route::get('alerts',function (){
    return view('ui.alerts');
});
Route::get('animations',function (){
    return view('ui.animations');
});
Route::get('badges',function (){
    return view('ui.badges');
});
Route::get('breadcrumps',function (){
    return view('ui.breadcrumps');
});Route::get('buttons',function (){
    return view('ui.buttons');
});Route::get('collapse',function (){
    return view('ui.collapse');
});Route::get('colors',function (){
    return view('ui.colors');
});Route::get('dialogs',function (){
    return view('ui.dialogs');
});Route::get('icons',function (){
    return view('ui.icons');
});
Route::get('labels',function (){
    return view('ui.labels');
});Route::get('list_group',function (){
    return view('ui.list_group');
});Route::get('media_object',function (){
    return view('ui.media_object');
});Route::get('modals',function (){
    return view('ui.modals');
});Route::get('notifications',function (){
    return view('ui.notifications');
});Route::get('pagination',function (){
    return view('ui.pagination');
});Route::get('preloaders',function (){
    return view('ui.preloaders');
});Route::get('progressbars',function (){
    return view('ui.progressbars');
});Route::get('range_sliders',function (){
    return view('ui.range_sliders');
});Route::get('sortable_nestable',function (){
    return view('ui.sortable_nestable');
});Route::get('tabs',function (){
    return view('ui.tabs');
});Route::get('thumbnails',function (){
    return view('ui.thumbnails');
});Route::get('tooltips_popovers',function (){
    return view('ui.tooltips_popovers');
});Route::get('waves',function (){
    return view('ui.waves');
});

//form routes
Route::get('advanced_form_elements',function (){
    return view('forms.advanced_form_elements');
});
Route::get('basic_form_elements',function (){
    return view('forms.basic_form_elements');
});
Route::get('editors',function (){
    return view('forms.editors');
});
Route::get('form_examples',function (){
    return view('forms.form_examples');
});
Route::get('form_validation',function (){
    return view('forms.form_validation');
});
Route::get('form_wizard',function (){
    return view('forms.form_wizard');
});
//table routes
Route::get('editable_table',function (){
    return view('tables.editable_table');
});
Route::get('jquery_datatable',function (){
    return view('tables.jquery_datatable');
});
Route::get('normal_tables',function (){
    return view('tables.normal_tables');
});
//media routes
Route::get('carousel',function (){
    return view('medias.carousel');
});
Route::get('image_gallery',function (){
    return view('medias.image_gallery');
});

//charts routes
Route::get('chartjs',function (){
    return view('charts.chartjs');
});
Route::Get('flot',function (){
    return view('charts.flot');
});
Route::get('jquery_knob',function (){
    return view('charts.jquery_knob');
});
Route::get('morris',function (){
    return view('charts.morris');
});
Route::get('sparkline',function (){
    return view('charts.sparkline');
});

//map routes
Route::get('google',function (){
    return view('maps.google');
});
Route::get('jvectormap',function (){
    return view('maps.jvectormap');
});
Route::get('yandex',function (){
    return view('maps.yandex');
});

//changelog route
Route::get('changelogs',function (){
    return view('changelogs');
});
});

Route::get('/home', 'HomeController@index')->name('home');
