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
Route::get('/medeelel', 'App\Http\Controllers\Controller@medeelel');
Route::get('/getAuLevel2/{id}', 'App\Http\Controllers\Controller@getAuLevel2');
Route::any('/get/data/{id}', 'App\Http\Controllers\Controller@getDataForInformation')->name('get.data');
Route::any('/get/datas/{id}', 'App\Http\Controllers\Controller@getDatasForLesson')->name('get.datas');

Route::get('login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::get('dashboard', [App\Http\Controllers\LoginController::class, 'dashboard']); 
Route::post('custom-login', [App\Http\Controllers\LoginController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [App\Http\Controllers\LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [App\Http\Controllers\LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [App\Http\Controllers\LoginController::class, 'signOut'])->name('signout');



Route::group(['prefix'=>'', 'middleware' => ['auth']], function() {
    Route::group(['prefix'=>'admin', 'middleware' => 'role:Admin'], function () {
        // Admin-only routes
        Route::resource('/exam', "App\Http\Controllers\ExamController");
        Route::any('/exam/list/datatable', "App\Http\Controllers\ExamController@dataTableList")->name('exam.datalist');

        Route::resource('/information', "App\Http\Controllers\InformationController");
        Route::any('/information/list/datatable', "App\Http\Controllers\InformationController@dataTableList")->name('information.datalist'); 

        Route::any('/online/group', "App\Http\Controllers\OnlineController@getGroup");
        Route::any('/online/group/update/data/{id}', 'App\Http\Controllers\OnlineController@updateGroup');
        Route::any('/online/group/{id}/edit', "App\Http\Controllers\OnlineController@getGroupEdit");
        Route::any('/online/group/{id}/delete', "App\Http\Controllers\OnlineController@destroyGroup");
        Route::any('/online/group/list/datatable', "App\Http\Controllers\OnlineController@groupDataTableList")->name('online.group.datalist');
        
        Route::resource('/online', "App\Http\Controllers\OnlineController");
        Route::any('/online/update/data/{id}', 'App\Http\Controllers\OnlineController@updateData')->name('update.data');
        Route::post('/online/upload/video', 'App\Http\Controllers\OnlineController@uploadVideo')->name('videos.uploadVideo');
        Route::any('/online/list/datatable', "App\Http\Controllers\OnlineController@dataTableList")->name('online.datalist');

        Route::resource('/feedback', "App\Http\Controllers\FeedbackController");
        Route::any('/feedback/list/datatable', "App\Http\Controllers\FeedbackController@dataTableList")->name('feedback.datalist');

        Route::resource('/faq', "App\Http\Controllers\FaqController");
        Route::any('/faq/list/datatable', "App\Http\Controllers\FaqController@dataTableList")->name('faq.datalist');

        Route::resource('/question', "App\Http\Controllers\QuestionController");
        Route::any('/question/list/datatable', "App\Http\Controllers\QuestionController@dataTableList")->name('question.datalist');

        Route::resource('/takeradmin/exams', "App\Http\Controllers\ExamtakersController");
        Route::any('/examtakers/list/datatable', "App\Http\Controllers\ExamtakersController@dataTableList")->name('examtakers.datalist');

        Route::resource('/result', "App\Http\Controllers\ResultController");
        Route::any('/result/list/datatable', "App\Http\Controllers\ResultController@dataTableList")->name('result.datalist');

        Route::resource('/certificate', "App\Http\Controllers\CertificateController");
        Route::any('/certificate/list/datatable', "App\Http\Controllers\CertificateController@dataTableList")->name('certificate.datalist');

        Route::resource('/systemuser', "App\Http\Controllers\SystemuserController");
        Route::any('/systemuser/list/datatable', "App\Http\Controllers\SystemuserController@dataTableList")->name('systemuser.datalist');

        Route::resource('/users', "App\Http\Controllers\UsersController");
        Route::any('/users/list/datatable', "App\Http\Controllers\UsersController@dataTableList")->name('users.datalist');
    });

    Route::group(['prefix'=>'', 'middleware' => 'role:Customer'], function () {
        //Customer
        Route::resource('/exam', 'App\Http\Controllers\HomeExamController');
        Route::get('/exam/detail/{id}', 'App\Http\Controllers\HomeExamController@examDetail');
        Route::get('/certi', 'App\Http\Controllers\Controller@certi');
        Route::get('/faq', 'App\Http\Controllers\Controller@faq');
        Route::get('/feedback', 'App\Http\Controllers\Controller@feedback');
        Route::get('/detailinfo', 'App\Http\Controllers\Controller@detailinfo');
        Route::get('/course', 'App\Http\Controllers\Controller@course');
        Route::get('/lesson', 'App\Http\Controllers\Controller@lesson');
        Route::get('/online_course', 'App\Http\Controllers\Controller@online_course');
       
        Route::get('/online', 'App\Http\Controllers\Controller@online');
    });
    Route::resource('/profile', "App\Http\Controllers\UserController");
    Route::any('/profile/edit/{id}', "App\Http\Controllers\UserController@update");
});

Route::get('/do/logout', "App\Http\Controllers\LoginController@doLogOut");

Route::get('/register', 'App\Http\Controllers\UsersController@getRegisterIndex');

Route::get('exam/detail', function(){
    return view('exam.detail');
});
Route::any('/register/save', "App\Http\Controllers\UsersController@storeRegister")->name('register.store');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });
Route::resource('/admin/dashboard', "App\Http\Controllers\DashboardController");
Route::any('/admin/dashboard/list/datatable', "App\Http\Controllers\DashboardController@dataTableList")->name('dashboard.datalist');

// Route::get('/payment', "App\Http\Controllers\Controller@payment");

Route::get('/chartjs', function () {
    return view('chartjs');
});
Route::get('/360', function () {
    return view('pano');
});

Route::get('/pdf', "App\Http\Controllers\Controller@pdf");
Route::get('/qrcode', function () {
  
    return QrCode::size(300)->generate('A basic example of QR code!');
});
