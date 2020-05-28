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
Auth::routes(['verify'=>true]);

Route::view('/about','pages.about');
Route::get('download/{filename}', function($filename)
{
    // Check if file exists in public/storage/news folder
    $file_path = public_path().'\storage\news\\'.$filename;
   // return $file_path;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        return $file_path;
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\s\_\.]+');
Route::get('/','PagesController@index');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm');
Route::get('/register/teacher', 'Auth\RegisterController@showTeacherRegisterForm');
Route::get('/download', 'ExportController@export');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');
Route::post('/register/teacher', 'Auth\RegisterController@createTeacher');
Route::post('/save', 'HomeController@store')->middleware('auth');
// Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
// Route::view('/teacher', 'teacher')->middleware('auth:teacher');
Route::post('/teacher/password/email', 'Auth\TeacherForgotPasswordController@sendResetLinkEmail');
Route::get('/teacher/password/reset', 'Auth\TeacherForgotPasswordController@showLinkRequestForm');
Route::post('/teacher/password/reset', 'Auth\TeacherResetPasswordController@reset');
Route::get('/teacher/password/reset/{token}', 'Auth\TeacherResetPasswordController@showResetForm');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/teacher', 'TeachersController@index')->middleware('auth:teacher');
Route::group(['prefix' => 'teacher', 'middleware' => 'auth:teacher'], 
function () 
{
    // Route::get('checkstatus', 'TeachersController@checkstatus');
    Route::get('test3','TeachersController@showTestThree')->name('test3');
    Route::post('test3','TeachersController@storeTestThree');
    // Route::get('send', 'MailsController@send');
    Route::view('','Teacher.dashboard');
    Route::get('putmarks', 'TeachersController@showClassesSubjects');
    Route::get('password/teacher', 'TeachersController@resetPassword');
    // Route::post('status','TeachersController@status');
    // Route::get('status','TeachersController@showStatus');
    Route::get('profile', 'ProfileController@index');
    Route::get('updateprofile','ProfileController@indexTeacher');
    Route::patch('updateprofile/{id}', 'ProfileController@update');
    Route::get('studentmarks','TeachersController@showStudents');
    Route::post('studentmarks','TeachersController@createSessionForTeacher');
    Route::post('submitmarks','TeachersController@store');
    Route::post('marks','TeachersController@marks');
    Route::get('editmarks','TeachersController@editMarks');
    Route::post('editmarks','TeachersController@editMarksCreateSession');
    Route::get('editmarkslist','TeachersController@showStudentList');
    Route::post('editmarkslist','TeachersController@storeMarks');
    Route::get('parent','TeachersController@parentDetails');
    Route::post('parent','TeachersController@viewParent');
    Route::get('classpdf','TeachersController@viewMarks');

    // Route::get('marks','TeachersController@marksDetails');
    // Route::post('marks','TeachersController@viewMarks');



}
);  
Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], 
function () 
{
    Route::get('','HomeController@dashboard');
    Route::get('testthree','HomeController@testThreeMarks');
    Route::get('application/{id}/{testno}','HomeController@application')->name('home.application');
    Route::post('application','HomeController@storeApplication');
    Route::get('marks','HomeController@index');
    Route::get('profile', 'ProfileController@indexStudent');
    Route::get('updateprofile','ProfileController@indexStu');
    Route::patch('updateprofile/{id}', 'ProfileController@updateStudent');
});
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () 
{
    Route::get('teachers','AdminsController@showTeacher');
    Route::post('teachers','AdminsController@storeTeacher');
    Route::get('managenews','AdminsController@showNews');
    Route::post('managenews','AdminsController@storeNews');
    Route::post('deletenews/{id}','AdminsController@deleteNews');
    Route::post('teachers/{id}','AdminsController@deleteTeacher');
    Route::get('','AdminsController@index');
    Route::get('applications','AdminsController@showApplications');
    Route::get('applications/{id}','AdminsController@Application');
    Route::post('applications/{id}','AdminsController@storeApplication');
    Route::get('/class/{div}', 'PDFController@getclass');
    Route::get('replace','AdminsController@replace');
    Route::post('replace','AdminsController@replaceTeacher');
    Route::get('classReport','AdminsController@classReport');
    Route::post('classReport','AdminsController@classReportview');
    Route::post('truncatedivTeacher','AdminsController@truncatedivTeacher');
}  
);
//Route::get('/download','TestController@export');
//Route::get('/download1','UserController@export');
Route::get('/marks/{div}/{sub}/{sem}', 'PDFController@getmarks');
Route::get('/parent/{div}', 'PDFController@getparent');
Route::get('/class/{div}/{sem}', 'PDFController@getclass');
Route::get('/student/{div}/{stu}/{sem}', 'PDFController@getstudent');
