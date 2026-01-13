<?php

use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/optimize', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return 'Command executed successfully!';
    // return what you want
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return redirect()->route('admin.login');
    // return "ok";
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('partners', PartnerController::class)->names('partners');
        Route::resource('testimonials', TestimonialController::class)->names('testimonials');
        Route::resource('case-studies', CaseStudyController::class)->names('case-studies');
        Route::resource('profile-setting', SettingController::class)->names('profile-setting');
        Route::post('chnage-password/{id}', [SettingController::class, 'chnagePassword'])->name('chnage-password');
    });
});

// Route::middleware(['auth:web'])->group(function () {
//     // User protected routes
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
