<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\PatientManagementController;

/*Public Routes*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/* Auth Routes (Laravel Breeze)*/
require __DIR__ . '/auth.php';

/* Patient Routes (Authenticated)*/
Route::middleware('auth')->group(function () {

    // Book appointment
    Route::get('/book', [AppointmentController::class, 'create'])
        ->name('book.form');

    Route::post('/book', [AppointmentController::class, 'store'])
        ->name('book.store');

    // View appointments
    Route::get('/appointments', [AppointmentController::class, 'index'])
        ->name('appointments.index');

    // Cancel appointment (route name must match Blade)
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])
        ->name('appointments.cancel'); // ← IMPORTANT
});

/*Admin Authentication*/
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.post');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

/* Admin Protected Routes*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [AdminPanelController::class, 'index'])
            ->name('admin.dashboard');

        // Doctors
        Route::resource('doctors', DoctorController::class)
            ->except(['show', 'edit', 'update']);

        // Patients
        Route::get('patients', [PatientManagementController::class, 'index'])
            ->name('admin.patients.index');

        Route::delete('patients/{id}', [PatientManagementController::class, 'destroy'])
            ->name('admin.patients.destroy');

        // Appointments
        Route::get('appointments', [AdminPanelController::class, 'appointments'])
            ->name('admin.appointments.index');

        Route::delete('appointments/{id}', [AdminPanelController::class, 'destroyAppointment'])
            ->name('admin.appointments.destroy');
    });
