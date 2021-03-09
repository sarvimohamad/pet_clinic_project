<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::middleware(['auth'])->group(function () {
    //Route::get('user/dashboard',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
    Route::post('pet/create', [\App\Http\Controllers\PetController::class, 'create'])->name('pet.create');
    Route::get('pet', [\App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
    Route::get('pet/{id}/delete', [\App\Http\Controllers\PetController::class, 'destroy'])->name('pet.destroy');
    Route::get('pet/{id}/undo', [\App\Http\Controllers\PetController::class, 'undo'])->name('pet.undo');
    Route::get('user/{userId}/pet/{petId}/edit', [\App\Http\Controllers\PetController::class, 'edit'])->name('pet.edit');
    Route::post('user/{userId}/pet/{petId}/update', [\App\Http\Controllers\PetController::class, 'update'])->name('pet.update');


    Route::get('category',[\App\Http\Controllers\CategoryPetController::class, 'index']);


    Route::get('vets' , [\App\Http\Controllers\VetController::class, 'index'])->name('vet.index');
    Route::post('vets/store' , [\App\Http\Controllers\VetController::class, 'store'])->name('vet.store');
    });

    Route::get('appointment/{vet_id}' , [\App\Http\Controllers\AppointmentController::class,'index'])->name('appointment.index');
    Route::post('appointment/{vet_id}/book' , [\App\Http\Controllers\AppointmentController::class,'book'])->name('appointment.book');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
