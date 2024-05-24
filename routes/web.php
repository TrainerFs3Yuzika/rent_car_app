<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Auth\RegisterController;

// Rute untuk halaman landing
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('daftar-mobil', [FrontendCarController::class, 'index'])->name('car.index');
Route::get('daftar-mobil/{car}', [FrontendCarController::class, 'show'])->name('car.show');
Route::post('daftar-mobil', [FrontendCarController::class, 'store'])->name('car.store');
Route::get('blog', [FrontendBlogController::class, 'index'])->name('blog.index');
Route::get('blog/{blog:slug}', [FrontendBlogController::class, 'show'])->name('blog.show');
Route::get('tentang-kami', [AboutController::class, 'index']);
Route::get('kontak', [ContactController::class, 'index']);
Route::post('kontak', [ContactController::class, 'store'])->name('contact.store');
Route::get('bookings/create', [AdminBookingController::class, 'create'])->name('bookings.create');
Route::post('bookings', [PesanController::class, 'store'])->name('bookings.store');
Route::get('/pesan', [PesanController::class, 'index'])->name('pesan');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute untuk dashboard admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('cars', CarController::class)->only(['index', 'update', 'edit', 'store', 'create', 'destroy']);
    Route::resource('types', TypeController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('settings', SettingController::class)->only(['index', 'store', 'update']);
    Route::resource('contacts', AdminContactController::class)->only(['index', 'destroy']);
    Route::resource('bookings', AdminBookingController::class)->only(['index', 'destroy']);
    Route::resource('blogs', BlogController::class);
});

// Rute untuk dashboard user
Route::group(['middleware' => ['auth', 'renter'], 'prefix' => 'renter', 'as' => 'renter.'], function () {
    Route::get('/dashboard', [RenterController::class, 'dashboard'])->name('dashboard');
});


