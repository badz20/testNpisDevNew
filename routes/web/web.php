<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RollingPlan;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CaptchaServiceController;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', function () {    
    return view('main.main');
})->name('main');
Route::get('/new', function () {    
    return view('ResponsiveMain/main');
})->name('new');

Auth::routes();

Route::group(['middleware' => ['auth']], function () { 
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::get('/userlist', [UserController::class, 'userlist']);
    Route::get('/selenggara_dashboard_analisis', [UserController::class, 'selenggara_dashboard_analisis']);
    Route::get('fectchuser', [UserController::class, 'fectchuser']);
    Route::get('/userlist_demo', [UserController::class, 'userlist_demo']);

    Route::get('/temp/users', [UserController::class, 'indexTemp'])->name('users.temp.index');
    Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
    Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
    Route::get('/user/approval/{id}', [UserController::class, 'userApproval'])->name('user.approval');
    Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
    Route::get('/user/first/reset', [UserController::class, 'firstReset'])->name('first.reset');
    Route::post('/user/first/update', [UserController::class, 'firstResetUpdate'])->name('first.reset.update');
    Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');


    Route::get('/user-profile/{temp}/{id}', [UserController::class, 'userProfile'])->name('user.profile');

    // Route::get('/pengesahan-pengguna-baharu', function () {
    //     return view('users.user_validation.user_validation');
    // })->name('new_user_validation');
    Route::get('/pengesahan-pengguna-baharu', [UserController::class, 'pengesahan_pengguna_baharu'])->name('new_user_validation');


    //Route::get('/user/temp-user-update/{id}', [UserController::class, 'userReject'])->name('user.reject');

    Route::get('/audit-logs', [UserController::class, 'auditLogs'])->name('user.auditLogs');
    Route::get('/project-logs', [UserController::class, 'ProjectTrail'])->name('user.ProjectTrail');
    Route::get('/login-logs', [UserController::class, 'loginTrail'])->name('user.loginTrail');
    Route::get('/registration-logs', [UserController::class, 'registrationTrail'])->name('user.registrationTrail');
    Route::get('/Selenggara_Kod_Projek', [UserController::class, 'Selenggara_Kod_Projek'])->name('Selenggara_Kod_Projek');

    // Route::get('/Selenggara_Kod_Projek', function () {
    //     return view('selenggaraviews.kod_projek.Selenggara_Kod_Projek');
    // })->name('Selenggara_Kod_Projek')->middleware(['can-access-either:pentadbir_Selenggara_Kod_Projek_full,pentadbir_Selenggara_Kod_Projek_view,pentadbir_Selenggara_Kod_Projek_edit']);

    Route::get('/login_demo', function () {
        return view('auth/login_demo');
    })->name('login_demo');
    Route::get('/selenggara_map_services', [UserController::class, 'selenggara_map_services'])->name('selenggara_map_services')->middleware(['can-access-either:pentadbir_selenggara_map_services_full,pentadbir_selenggara_map_services_view,pentadbir_selenggara_map_services_edit']);

    // Route::get('/selenggara_map_services', function () {
    //     return view('selenggaraviews.map_services.selenggara_map_services');
    // })->name('selenggara_map_services')->middleware(['can-access-either:pentadbir_selenggara_map_services_full,pentadbir_selenggara_map_services_view,pentadbir_selenggara_map_services_edit']);

    // Route::get('/user/temp-user-update/{id}', function () {
    //     return view('users.reject_update.user_reject_update');
    // })->name('user_reject_update');

    // Route::get('/daftar-pengguna-baharu', function () {
    //     return view('users.daftar_baharu.daftar_baharu');
    // })->name('add_new_user');
    Route::get('/daftar-pengguna-baharu', [UserController::class, 'daftar_pengguna_baharu'])->name('add_new_user')->middleware(['can-access-either:pentadbir_daftar-pengguna-baharu_full,pentadbir_daftar-pengguna-baharu_view,pentadbir_daftar-pengguna-baharu_edit']);


    Route::get('/selenggara-pengurusan-peranan', [UserController::class, 'selenggara_pengurusan_peranan'])->name('list_pengurusan_peranan')->middleware(['can-access-either:pentadbir_selenggara-pengurusan-peranan_full,pentadbir_selenggara-pengurusan-peranan_view,pentadbir_selenggara-pengurusan-peranan_edit']);

    // Route::get('/selenggara-pengurusan-peranan', function () {
    //     return view('users.peranan.list_pengurusan_peranan');
    // })->name('list_pengurusan_peranan');

    Route::get('/add-selenggara-pengurusan-peranan', function () {
        return view('users.peranan.pengurusan_peranan');
    })->name('pengurusan_peranan');

    Route::post('switch', [UserController::class, 'switch']);
    
    Route::get('Senarai_Peruntukan', [RollingPlan::class, 'Senarai_Peruntukan'])->name('Senarai_Peruntukan');
    Route::get('rp_bkor', [RollingPlan::class, 'rp_bkor'])->name('rp_bkor');

    Route::get('Unauthorized', [UserController::class, 'Unauthorized'])->name('Unauthorized');



    
});

Route::get('/user/temp-user-update/{id}', function () {
    return view('users.reject_update.user_reject_update');
})->name('user_reject_update');

