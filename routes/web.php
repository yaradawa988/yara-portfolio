<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\UserConversationController;
use App\Http\Controllers\GoogleAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class)->only(['index','show']);
});

require __DIR__.'/auth.php';
Route::get('/', [WelcomeController::class,'index'])->name('welcome');



Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

//

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

//
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', App\Http\Controllers\Admin\AdminProjectController::class);
});

// إرسال رسالة
Route::post('/contact/store', [UserContactController::class, 'store'])->name('contact.store');

// لوحة التحكم
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/messages', [ContactAdminController::class, 'index'])->name('admin.messages.index');
    Route::get('admin/messages/{contact}', [ContactAdminController::class, 'show'])->name('admin.messages.show');
    Route::post('admin/messages/{contact}/reply', [ContactAdminController::class, 'reply'])->name('admin.messages.reply');
});


Route::middleware('auth')->group(function () {
    Route::get('/conversation/{contact}', [UserConversationController::class, 'index'])
        ->name('messages.chat');
    Route::post('/conversation/{contact}/send', [UserConversationController::class, 'sendMessage'])
        ->name('messages.chat.send');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/messages/chat/{contact}', [UserConversationController::class, 'chat'])
        ->name('messages.chat');
});
// Google Login
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
