<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\DashboardController;
use App\http\Controllers\FullCalendarController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SMSController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'showAdminHome'])->name('admin.home');

route::get('/dashboard',[DashboardController:: class,'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'showAdminHome'])->name('admin.home');


Route::middleware('auth',)->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('admins', [\App\Http\Controllers\UserController::class, 'indexAdmin'])->name('admin.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::view('/sample', 'sample.sample');

Route::get('/manage_account', function () {
    return view('admin_dashboard.manage_acc');
})->name('admin.dashboard.manage_account')->middleware(['auth','admin']);

Route::get('/manage_admin_account', function () {
    return view('admin_dashboard.manage_admin_acc');
})->name('admin.dashboard.manage_admin_account')->middleware(['auth','admin']);

Route::get('/send_sms', function () {
    return view('admin_dashboard.send_sms');
})->name('admin.dashboard.send_sms')->middleware(['auth','admin']);

Route::get('/calendar', function () {
    return view('admin_dashboard.calendar');
})->name('admin.dashboard.calendar')->middleware(['auth','admin']);

Route::get('/post', function () {
    return view('admin_dashboard.post');
})->name('admin.dashboard.post')->middleware(['auth','admin']);

// calendar
Route::get('/getevent', [FullCalendarController::class, 'getEvent'])->name('getevent');
Route::post('/createevent', [FullCalendarController::class, 'createEvent'])->name('createevent');
Route::post('/deleteevent', [FullCalendarController::class, 'deleteEvent'])->name('deleteevent');

Route::post('/chatbot/get-response', [ChatBotController::class, 'getResponse']);
Route::post('/chatbot/respond', [ChatBotController::class, 'respond']);

// Chatbot
Route::resource("/chatbot",ChatBotController::class);
Route::post('chatbot/{id}/update', 'ChatBotController@update')->name('chatbot.update');
Route::post('chatbot/{id}/update', [ChatBotController::class, 'update'])->name('chatbot.update');
Route::delete('chatbot/{id}', 'ChatBotController@destroy')->name('chatbot.destroy');
Route::get('/edit/{id}', [ChatBotController::class, 'edit'])->name('chatbot.edit');

Route::group(['middleware' => 'web'], function () {
    Auth::routes();
});

// admin
Route::delete('adminusers/{id}', [AdminUserController::class, 'destroy'])->name('adminusers.destroy');
Route::resource("/admins",AdminUserController::class);
Route::get('/admins', [AdminUserController::class, 'index'])->name('admin.index');
Route::get('admin/users', [AdminUserController::class, 'index'])->name('adminusers.index');

// post
Route::resource("/post", PostController::class);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// sms
Route::get('/send_sms', [SMSController::class, 'showForm']);
Route::post('/send_sms', [SMSController::class, 'sendSMS'])->name('admin.send.sms');