<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [NotificationController::class, 'index'])->name('home');
Route::post('/submit-form', [NotificationController::class, 'submitForm'])->name('submit.form');
Route::get('/notifications', function () {
    return view('notifications');
});
