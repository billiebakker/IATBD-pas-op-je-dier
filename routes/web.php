<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\PetsitterAdvertController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdvertResponseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

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
    return redirect('/dashboard');
});

Route::get('dashboard', [AdvertResponseController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'verified');
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    // profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'uploadProfilePicture'])->name('profile.uploadProfilePicture');

    // pet routes
    Route::get('/pets/{pet}/respond', [PetController::class, 'respond'])->name('pets.respond');
    Route::get('/my-pets', [PetController::class, 'myPets'])->name('pets.my-pets');
    Route::resource('pets', PetController::class);

    // advert-responses routes
    Route::get('/advert-responses/outbox', [AdvertResponseController::class, 'outbox'])->name('advert-responses.outbox');
    Route::resource('advert-responses', AdvertResponseController::class);

    // pet-sitter routes
    Route::get('/petsitter-adverts/{petsitterAdvert}/respond', [PetsitterAdvertController::class, 'respond'])->name('petsitter-adverts.respond');
    Route::resource('petsitter-adverts', PetsitterAdvertController::class);

    // petsitter-advert-responses routes
//    Route::get('/petsitter-advert-responses/outbox', [App\Http\Controllers\PetsitterAdvertResponseController::class, 'outbox'])->name('petsitter-advert-responses.outbox');
    Route::resource('petsitter-advert-responses', App\Http\Controllers\PetsitterAdvertResponseController::class);
});

require __DIR__ . '/auth.php';
