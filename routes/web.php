<?php
use App\Http\Controllers\AdminController; // <--- ເພີ່ມບັນທັດນີ້
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- ສ່ວນຂອງຜູ້ໃຊ້ທົ່ວໄປ (ບໍ່ຕ້ອງ Login ກໍເຂົ້າໄດ້) ---
Route::get('/', [ServiceController::class, 'index']); 
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// --- ສ່ວນຂອງ Admin (ຕ້ອງ Login ເທົ່ານັ້ນ) ---
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/bookings', [AdminController::class, 'index'])->name('admin.bookings');
    // ເພີ່ມບັນທັດນີ້:
    Route::patch('/admin/bookings/{booking}/status', [AdminController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
