<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\DashboardController;
use App\http\Controllers\FullCalendarController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\QueryController;


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

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) ->middleware(['auth', 'verified'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'showAdminHome'])->middleware('verified')->name('admin.home');

route::get('/dashboard',[DashboardController:: class,'index'])->middleware('auth','verified')->name('dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'showAdminHome'])->middleware('verified')->name('admin.home');


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
Route::get('/getevent', [\App\Http\Controllers\FullCalendarController::class, 'getEvent'])->name('getevent');
Route::post('/createevent', [\App\Http\Controllers\FullCalendarController::class, 'createEvent'])->name('createevent');
Route::post('/deleteevent', [\App\Http\Controllers\FullCalendarController::class, 'deleteEvent'])->name('deleteevent');

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
Route::delete('adminusers/{id}', 'AdminUserController@destroy')->name('adminusers.destroy');
Route::resource("/admins",AdminUserController::class);
Route::get('/admins', [AdminUserController::class, 'index'])->name('admin.index');
Route::delete('adminusers/{id}', 'App\Http\Controllers\AdminUserController@destroy')->name('adminusers.destroy');



// post
Route::resource("/post", PostController::class)->middleware(['auth','admin']);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware(['auth','admin']);
Route::get('/posts', [PostController::class, 'store'])->name('posts.store')->middleware(['auth','admin']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth','admin']);

// sms
Route::get('/send_sms', [SMSController::class, 'showForm']);
Route::post('/send_sms', [SMSController::class, 'sendSMS'])->name('admin.send.sms');

// user delete
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

Route::get('/landing-page', function () {
    return view('landing_page.index');
});

Route::get('/calendar', function () {
    return view('calendarsample');
});

// Request delete
Route::post('/delete-account', 'App\Http\Controllers\UserController@submitDeleteAccount')->name('delete.account.submit');
Route::get('/delete-account', 'App\Http\Controllers\UserController@showDeleteAccountForm')->name('delete.account');
Route::view('/after-delete', 'users.after_delete')->name('after.delete');
Route::get('/deleteindex', 'App\Http\Controllers\UserController@deleteindex')->name('users.deleteindex');


Route::get('/submit-query', [App\Http\Controllers\QueryController::class, 'showQueryForm'])->name('show.query.form');
Route::post('/submit-query', [App\Http\Controllers\QueryController::class, 'submitQuery'])->name('submit.query');

Route::middleware('admin')->group(function () {
    Route::get('/admin/queries', [QueryController::class, 'showQueries'])->name('admin.query_management');
    Route::post('/admin/reply-query/{id}', [App\Http\Controllers\QueryController::class, 'replyQuery'])->name('admin.reply.query');
});