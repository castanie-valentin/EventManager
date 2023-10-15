<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Http\Controllers\EventController;
use Carbon\Carbon;

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

/* All the event route */
Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class,'show'])->name('events');
Route::get('/event/create', [EventController::class, 'create'])->middleware(['auth', 'verified'])->name('event.create');
Route::post('/event', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('event.store');
Route::get('events/{event}/edit',[EventController::class,'edit'])->middleware(['auth', 'verified'])->name('event.edit');
Route::patch('/events/{event}', [EventController::class,'update'])->middleware(['auth', 'verified'])->name('event.update');
Route::delete('/events/{event}', [EventController::class,'destroy'])->middleware(['auth', 'verified'])->name('event.destroy');


/* Other route */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
