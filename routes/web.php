<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DoctorController as DoctorController;
use App\Http\Controllers\Admin\MessageController as MessageController;
use App\Http\Controllers\Admin\ReviewController as ReviewController;
use App\Http\Controllers\Admin\SpecializationController as SpecializationController;
use App\Http\Controllers\Admin\SponsorController as SponsorController;
use App\Http\Controllers\Admin\VoteController as VoteController;
use App\Http\Controllers\Admin\StatisticController as StatisticController;

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
/* Rotta alla pagina Home */

Route::get('/', function () {
    return view('welcome');
});

/* Rotta predefinite autorizzazioni utente registrato */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Rotta per dashboard utente registrato */
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('statistic', AdminController::class)->name('statistic');
    Route::resource('doctors', DoctorController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('votes', VoteController::class);
    Route::resource('sponsors', SponsorController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('statistics', StatisticController::class);
});


require __DIR__ . '/auth.php';
