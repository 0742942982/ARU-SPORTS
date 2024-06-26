<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\scheduleController;

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
    return view('home');
});

// Comments routes
Route::prefix('comments')->group(function () {
    Route::get('/', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
Route::get('/admin/comments', [CommentController::class, 'index1'])->name('admin.comments');

// Home routes
Route::get('/home', [HomeController::class, 'usersIndex']);
Route::get('/about', [HomeController::class, 'aboutIndex']);
Route::get('/footer', [HomeController::class, 'footerIndex']);

// Events routes
Route::prefix('admin/events')->group(function () {
    Route::get('/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/', [EventController::class, 'index'])->name('admin.events.index');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
});

// Announcements routes
Route::prefix('admin/announcements')->group(function () {
    Route::get('/create', [AnnouncementController::class, 'create'])->name('admin.announcements.create');
    Route::post('/', [AnnouncementController::class, 'store'])->name('admin.announcements.store');
    Route::get('/', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
    Route::get('/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('admin.announcements.edit');
    Route::put('/{announcement}', [AnnouncementController::class, 'update'])->name('admin.announcements.update');
    Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('admin.announcements.destroy');
});

// Schedule routes
Route::prefix('admin/schedules')->group(function () {
    Route::get('/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
    Route::post('/store', [ScheduleController::class, 'store'])->name('admin.schedules.store');
    Route::get('/', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('/{schedule}/edit', [ScheduleController::class, 'edit'])->name('admin.schedules.edit');
    Route::put('/{schedule}', [ScheduleController::class, 'update'])->name('admin.schedules.update');
    Route::delete('/{id}', [ScheduleController::class, 'destroy'])->name('admin.schedules.destroy');
});
//home

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/a_contents', [AdminController::class, 'dashboard1'])->name('admin.a_contents');
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('admin.view_users');
    Route::get('/users/approve/{id}', [AdminController::class, 'approveUser'])->name('approve_user');
    Route::get('/users/block/{id}', [AdminController::class, 'blockUser'])->name('block_user');
    Route::get('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete_user');
});

// Additional admin routes
Route::prefix('admin')->group(function () {
    Route::get('admin/a_view_users', [Admin1Controller::class, 'viewUsers'])->name('admin.viewUsers');
    Route::get('admin/announcements', [Admin1Controller::class, 'viewAnnouncements'])->name('admin.viewAnnouncements');
    Route::get('admin/events', [Admin1Controller::class, 'viewEvents'])->name('admin.viewEvents');
    Route::get('admin/schedules', [Admin1Controller::class, 'viewSchedules'])->name('admin.viewSchedules');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/view_profile', [UsersController::class, 'showProfile'])->name('profile.show');
//     Route::get('/edit_profile/edit', [UsersController::class, 'editProfile'])->name('profile.edit');
//     Route::post('/profile', [UsersController::class, 'updateProfile'])->name('profile.update');
//     Route::get('/u_dashboard', [UsersController::class, 'dashboard'])->name('u_dashboard');
// });
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UsersController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [UsersController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile', [UsersController::class, 'updateProfile'])->name('profile.update');
    Route::get('/u_dashboard', [UsersController::class, 'dashboard'])->name('u_dashboard');
});
// my_profile

// Registration and authentication routes
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register_check', [UsersController::class, 'register_check'])->name('register_check');
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login_check', [UsersController::class, 'login_check'])->name('login_check');

// General user routes
Route::get('/users/views', [User1Controller::class, 'viewUsers'])->name('users.viewUsers');
Route::get('/users/announcements', [User1Controller::class, 'viewAnnouncements']);
Route::get('/users/events', [User1Controller::class, 'viewEvents']);
Route::get('/users/schedules', [User1Controller::class, 'viewSchedules']);
Route::get('/users/users_header', [User1Controller::class, 'viewHeader']);
Route::get('/admin/a_header', [User1Controller::class, 'view1Header']);
