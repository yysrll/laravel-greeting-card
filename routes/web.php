<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\ProfileController;
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
})->name('welcome');
Route::get('/create-form', function () {
    return view('pages.form.form');
})->name('create-form');

Route::resource('greetingcard', GreetingController::class);
Route::get('/template-image/{id}', [GreetingController::class, 'getTemplate'])->name('templateImage');
Route::get('/get-image/{id}/{index}', [GreetingController::class, 'getImage'])->name('getImage');
Route::get('/download-image/{greeting}', [GreetingController::class, 'downloadImage'])->name('downloadImage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-share', function () {
    return view('testing-share');
})->name('test');
Route::get('/resetImageDb', [GreetingController::class, 'resetImageDb'])->name('resetImageDb');

require __DIR__ . '/auth.php';
