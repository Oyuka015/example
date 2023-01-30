<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\Controller@aa');
Route::get('/test', 'App\Http\Controllers\Controller@aa');
Route::get('/medeelel', 'App\Http\Controllers\Controller@medeelel');
Route::get('/exam', 'App\Http\Controllers\Controller@exam');
Route::get('/certi', 'App\Http\Controllers\Controller@certi');
Route::get('/faq', 'App\Http\Controllers\Controller@faq');
Route::get('/online', 'App\Http\Controllers\Controller@online');
Route::get('/feedback', 'App\Http\Controllers\Controller@feedback');

Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('dashboard', [App\Http\Controllers\LoginController::class, 'dashboard']); 
Route::post('custom-login', [App\Http\Controllers\LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\LoginController::class, 'signOut'])->name('signout');

Route::resource('/admin/information', "App\Http\Controllers\InformationController");
Route::any('/admin/information/list/datatable', "App\Http\Controllers\InformationController@dataTableList")->name('information.datalist'); 

Route::resource('/admin/online', "App\Http\Controllers\OnlineController");
Route::any('/admin/online/list/datatable', "App\Http\Controllers\OnlineController@dataTableList")->name('online.datalist');

Route::resource('/admin/feedback', "App\Http\Controllers\FeedbackController");
Route::any('/admin/feedback/list/datatable', "App\Http\Controllers\FeedbackController@dataTableList")->name('feedback.datalist');

Route::resource('/admin/faq', "App\Http\Controllers\FaqController");
Route::any('/admin/faq/list/datatable', "App\Http\Controllers\FaqController@dataTableList")->name('faq.datalist');

Route::resource('/admin/exam', "App\Http\Controllers\ExamController");
Route::any('/admin/exam/list/datatable', "App\Http\Controllers\ExamController@dataTableList")->name('exam.datalist');

Route::resource('/admin/examtakers', "App\Http\Controllers\ExamtakersController");
Route::any('/admin/examtakers/list/datatable', "App\Http\Controllers\ExamtakersController@dataTableList")->name('examtakers.datalist');

Route::resource('/admin/certificate', "App\Http\Controllers\CertificateController");
Route::any('/admin/certificate/list/datatable', "App\Http\Controllers\CertificateController@dataTableList")->name('certificate.datalist');

Route::resource('/admin/systemuser', "App\Http\Controllers\SystemuserController");
Route::any('/admin/systemuser/list/datatable', "App\Http\Controllers\SystemuserController@dataTableList")->name('systemuser.datalist');
Route::get('/register', function () {
    return view('register');
});

Route::get('/user_profile', function () {
    return view('user.profile');
});
Route::get('/user_info', function () {
    return view('user.info');
});
Route::get('/user_certificate', function () {
    return view('user.certificate');
});

Route::get('/hihi', function () {
    return view('hihi');
});