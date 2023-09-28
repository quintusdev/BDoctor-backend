<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/search', [DoctorController::class, 'search']);
Route::get('/doctors/{doctor_id}/specializations', [DoctorController::class, 'getSpecializations']);
Route::get('/sponsor-doctor', [App\Http\Controllers\Api\SponsorController::class, 'index']);
Route::get('/doctors/{doctor_id}', [DoctorController::class, 'show']);
Route::post('/reviews', [App\Http\Controllers\Api\ReviewController::class, 'store']);
Route::post('/messages', [App\Http\Controllers\Api\MessageController::class, 'store']);
Route::post('/vote', [App\Http\Controllers\Api\VoteController::class, 'store']);
Route::get('/average_votes/{doctorId}', [App\Http\Controllers\Api\DoctorController::class, 'getAverageVotes']);
