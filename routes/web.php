<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\KycController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\RoleController;
use App\Http\Controllers\Backend\Admin\SettingController;

// use App\Http\Controllers\Backend\PermissionController;


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
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post'); 

Route::get('register/success', [LoginController::class,'registered'])->name('registered');


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'loginPost'])->name('login');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Auth::routes(['verify' => true]);



Route::group(['middleware' => ['auth','verified']], function() {


    Route::get('profile',[ProfileController::class, 'index'])->name('profile');
    Route::post('profile',[ProfileController::class, 'storeupdate'])->name('profile.post');

    Route::post('post',[PostController::class, 'post'])->name('posts');



    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::get('/buy-token',[DashboardController::class, 'buy_token'])->name('buy-token');

    Route::get('kyc',[KycController::class, 'index'])->name('kyc');
    Route::get('kyc-application',[KycController::class, 'kyc_application'])->name('kyc-application');



    Route::resource('roles', RoleController::class);
    Route::resource('user', UserController::class);

    Route::get('/confirmed/{user}', [UserController::class,'confirmed'])->name('user.confirm');
    Route::get('/inactive/{user}', [UserController::class,'inactive'])->name('user.inactive');
    Route::get('/active/{user}', [UserController::class,'active'])->name('user.active');



    Route::get('/{user}/impersonate', [UserController::class,'impersonate'])->name('user.impersonate');
    Route::get('/leave-impersonate', [UserController::class,'leaveImpersonate'])->name('user.leave-impersonate');


    Route::get('/setting/token-setting', [SettingController::class,'token'])->name('token-setting');
    Route::post('/setting/token-setting', [SettingController::class,'tokenpost'])->name('token-setting.post');


    // Route::resource('products', ProductController::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



