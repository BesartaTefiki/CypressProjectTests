<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StylistController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Frontend\AppointmentController as FrontendAppointmentController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\WelcomeController;
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

Route::get('/',[WelcomeController::class, 'index']);

Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');
Route::get('/appointments/step-one', [FrontendAppointmentController::class, 'stepOne'])->name('appointments.step-one');
Route::post('/appointments/step-one', [FrontendAppointmentController::class, 'storeStepOne'])->name('appointments.store.step-one');
Route::get('/appointments/step-two', [FrontendAppointmentController::class, 'stepTwo'])->name('appointments.step-two');
Route::post('/appointments/step-two', [FrontendAppointmentController::class, 'storeStepTwo'])->name('appointments.store.step-two');
Route::get('/appointments/step-three', [FrontendAppointmentController::class, 'stepThree'])->name('appointments.step-three');
Route::post('/appointments/step-three', [FrontendAppointmentController::class, 'storeStepThree'])->name('appointments.store.step-three');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');
Route::get('/thankyou2', [WelcomeController::class, 'thankyou2'])->name('thankyou2');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth' , 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/' , [AdminController::class , 'index'])->name('index');
    Route::resource('/services' , ServiceController::class);
    Route::resource('/stylists' , StylistController::class);
    Route::resource('/appointments' , AppointmentController::class);
});

require __DIR__.'/auth.php';
