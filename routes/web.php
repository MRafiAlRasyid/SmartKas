<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');

// Download PDF
Route::get('/admin/dashboard/download-all-pdf', [DashboardController::class, 'downloadPDFAll'])->name('admin.downloadPDFAll');
Route::get('/admin/dashboard/download-by-date-pdf', [DashboardController::class, 'downloadPDFByDate'])->name('admin.downloadPDFByDate');

// Search
Route::get('/admin/dashboard/search', [DashboardController::class, 'search'])->name('admin.search');

// Pemasukan
Route::get('/admin/pemasukan', [PemasukanController::class, 'index'])->name('admin.pemasukan.index');
Route::get('admin/pemasukan/create', [PemasukanController::class, 'create'])->name('admin.pemasukan.create');
Route::post('admin/pemasukan/store', [PemasukanController::class, 'store'])->name('admin.pemasukan.store');
Route::get('admin/pemasukan/edit/{id}', [PemasukanController::class, 'edit'])->name('admin.pemasukan.edit');
Route::put('admin/pemasukan/edit/{id}', [PemasukanController::class, 'update'])->name('admin.pemasukan.update');
Route::delete('admin/pemasukan/delete/{id}', [PemasukanController::class, 'delete'])->name('admin.pemasukan.delete');

// Pengeluaran
Route::get('/admin/pengeluaran', [PengeluaranController::class, 'index'])->name('admin.pengeluaran.index');
Route::get('/admin/pengeluaran/create', [PengeluaranController::class, 'create'])->name('admin.pengeluaran.create');
Route::post('/admin/pengeluaran/store', [PengeluaranController::class, 'store'])->name('admin.pengeluaran.store');
Route::get('/admin/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->name('admin.pengeluaran.edit');
Route::put('/admin/pengeluaran/edit/{id}', [PengeluaranController::class, 'update'])->name('admin.pengeluaran.update');
Route::delete('/admin/pengeluaran/delete/{id}', [PengeluaranController::class, 'delete'])->name('admin.pengeluaran.delete');