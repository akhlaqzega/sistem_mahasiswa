<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

// Auth Routes
Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Mahasiswa Management
    Route::get('/mahasiswa/create', [AdminController::class, 'createMahasiswa'])->name('admin.mahasiswa.create');
    Route::post('/mahasiswa', [AdminController::class, 'storeMahasiswa'])->name('admin.mahasiswa.store');
    Route::get('/mahasiswa', [AdminController::class, 'indexMahasiswa'])->name('admin.mahasiswa.index');
    Route::get('/mahasiswa/{id}', [AdminController::class, 'showMahasiswa'])->name('admin.mahasiswa.show');
    Route::get('/mahasiswa/{id}/edit', [AdminController::class, 'editMahasiswa'])->name('admin.mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [AdminController::class, 'updateMahasiswa'])->name('admin.mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [AdminController::class, 'destroyMahasiswa'])->name('admin.mahasiswa.destroy');

    // Edit Requests
    Route::get('/edit-requests', [AdminController::class, 'indexEditRequests'])->name('admin.edit-requests.index');
    Route::get('/edit-requests/{id}', [AdminController::class, 'showEditRequest'])->name('admin.edit-requests.show');
    Route::post('/edit-requests/{id}/approve', [AdminController::class, 'approveEditRequest'])->name('admin.edit-requests.approve');
    Route::post('/edit-requests/{id}/reject', [AdminController::class, 'rejectEditRequest'])->name('admin.edit-requests.reject');
});

// Mahasiswa Routes
Route::prefix('mahasiswa')->middleware(['auth', 'mahasiswa'])->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::get('/profile', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
    
    // Edit Requests
    Route::get('/edit-request', [MahasiswaController::class, 'indexEditRequests'])->name('mahasiswa.edit-request.index');
    Route::get('/edit-request/create', [MahasiswaController::class, 'createEditRequest'])->name('mahasiswa.edit-request.create');
    Route::post('/edit-request', [MahasiswaController::class, 'storeEditRequest'])->name('mahasiswa.edit-request.store');
});