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
Route::any('/get/data/{id}', 'App\Http\Controllers\Controller@getDataForInformation')->name('get.data');

Route::get('/exam', 'App\Http\Controllers\Controller@exam');
Route::get('/certi', 'App\Http\Controllers\Controller@certi');
Route::get('/faq', 'App\Http\Controllers\Controller@faq');
Route::get('/feedback', 'App\Http\Controllers\Controller@feedback');
Route::get('/detailinfo', 'App\Http\Controllers\Controller@detailinfo');
Route::get('/course', 'App\Http\Controllers\Controller@course');
Route::get('/lesson', 'App\Http\Controllers\Controller@lesson');
Route::get('/online_course', 'App\Http\Controllers\Controller@online_course');

Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('dashboard', [App\Http\Controllers\LoginController::class, 'dashboard']); 
Route::post('custom-login', [App\Http\Controllers\LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\LoginController::class, 'signOut'])->name('signout');

Route::group(['prefix'=>'', 'middleware' => ['auth']], function() {
    Route::get('/online', 'App\Http\Controllers\Controller@online');

    Route::resource('/admin/exam', "App\Http\Controllers\ExamController");
    Route::any('/admin/exam/list/datatable', "App\Http\Controllers\ExamController@dataTableList")->name('exam.datalist');

    Route::resource('/admin/information', "App\Http\Controllers\InformationController");
    Route::any('/admin/information/list/datatable', "App\Http\Controllers\InformationController@dataTableList")->name('information.datalist'); 

    Route::any('/admin/online/group', "App\Http\Controllers\OnlineController@getGroup");
    Route::any('/admin/online/group/update/data/{id}', 'App\Http\Controllers\OnlineController@updateGroup');
    Route::any('/admin/online/group/{id}/edit', "App\Http\Controllers\OnlineController@getGroupEdit");
    Route::any('/admin/online/group/{id}/delete', "App\Http\Controllers\OnlineController@destroyGroup");
    Route::any('/admin/online/group/list/datatable', "App\Http\Controllers\OnlineController@groupDataTableList")->name('online.group.datalist');
    
    Route::resource('/admin/online', "App\Http\Controllers\OnlineController");
    Route::any('/admin/online/update/data/{id}', 'App\Http\Controllers\OnlineController@updateData')->name('update.data');
    Route::post('/admin/online/upload/video', 'App\Http\Controllers\OnlineController@uploadVideo')->name('videos.uploadVideo');
    Route::any('/admin/online/list/datatable', "App\Http\Controllers\OnlineController@dataTableList")->name('online.datalist');

    Route::resource('/admin/feedback', "App\Http\Controllers\FeedbackController");
    Route::any('/admin/feedback/list/datatable', "App\Http\Controllers\FeedbackController@dataTableList")->name('feedback.datalist');

    Route::resource('/admin/faq', "App\Http\Controllers\FaqController");
    Route::any('/admin/faq/list/datatable', "App\Http\Controllers\FaqController@dataTableList")->name('faq.datalist');

    Route::resource('/admin/exam', "App\Http\Controllers\ExamController");
    Route::any('/admin/exam/list/datatable', "App\Http\Controllers\ExamController@dataTableList")->name('exam.datalist');

    Route::resource('/admin/question', "App\Http\Controllers\QuestionController");
    Route::any('/admin/question/list/datatable', "App\Http\Controllers\QuestionController@dataTableList")->name('question.datalist');

    Route::resource('/admin/examtakers', "App\Http\Controllers\ExamtakersController");
    Route::any('/admin/examtakers/list/datatable', "App\Http\Controllers\ExamtakersController@dataTableList")->name('examtakers.datalist');

    Route::resource('/admin/result', "App\Http\Controllers\ResultController");
    Route::any('/admin/result/list/datatable', "App\Http\Controllers\ResultController@dataTableList")->name('result.datalist');

    Route::resource('/admin/certificate', "App\Http\Controllers\CertificateController");
    Route::any('/admin/certificate/list/datatable', "App\Http\Controllers\CertificateController@dataTableList")->name('certificate.datalist');

    Route::resource('/admin/systemuser', "App\Http\Controllers\SystemuserController");
    Route::any('/admin/systemuser/list/datatable', "App\Http\Controllers\SystemuserController@dataTableList")->name('systemuser.datalist');

    Route::resource('/admin/users', "App\Http\Controllers\UsersController");
    Route::any('/admin/users/list/datatable', "App\Http\Controllers\UsersController@dataTableList")->name('users.datalist');
});
Route::get('/do/logout', "App\Http\Controllers\LoginController@doLogOut");


Route::resource('/profile', "App\Http\Controllers\UserController");
Route::any('/profile/edit/{id}', "App\Http\Controllers\UserController@update");

Route::get('/register', function () {
    return view('register');
});
Route::get('exam/detail', function(){
    return view('exam.detail');
});
Route::any('/register/save', "App\Http\Controllers\UsersController@storeRegister")->name('register.store');

Route::get('/result', function () {
    return view('user.result');
});

Route::get('/hihi', function () {
    return view('user.hihi');
});
// Route::any('/test', function () {
//     return view('client.test');
// });


Route::get('test',[\App\Http\Controllers\TestController::class, 'index'])->name('client.test');
// Route::post('test',[\App\Http\Controllers\TestController::class, 'store'])->name('client.test.store');
// Route::get('results/{result_id}',[\App\Http\Controllers\ResultController::class, 'show'])->name('client.results.show');