<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ExchangeRateController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

// --- 1. ສ່ວນຂອງຜູ້ໃຊ້ທົ່ວໄປ (Public) ---
Route::get('/', [ServiceController::class, 'index']); 
Route::view('/services', 'services')->name('services');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/about', 'about')->name('about');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::post('/contact', 'store')->name('contact.store');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{id}', 'show')->name('products.show');
});
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
// --- 2. ສ່ວນຂອງ Admin (ຈັດການລະບົບ) ---
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // ຈັດການການຈອງ (Bookings)
    Route::get('/bookings', [AdminController::class, 'index'])->name('bookings');
    Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::resource('portfolio', ProjectController::class);

    // ຈັດການສິນຄ້າ (Products) - ປັບປຸງໃຫ້ມີ PATCH ສໍາລັບການ Edit
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'adminIndex')->name('products.index');
        Route::post('/products', 'store')->name('products.store');
        Route::patch('/products/{product}', 'update')->name('products.update'); // <--- ບັນທັດທີ່ແກ້ໄຂ Error
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    });

    // ຈັດການເລດເງິນ (Exchange Rate)
    Route::controller(ExchangeRateController::class)->group(function () {
        Route::get('/exchange-rate', 'index')->name('exchange-rate.index');
        Route::patch('/exchange-rate', 'update')->name('exchange-rate.update');
    });
});

// --- 3. ສ່ວນຂອງ Profile ແລະ ການຈັດການຮູບພາບ ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // ລຶບຮູບພາບສິນຄ້າແຍກ
    Route::delete('/product-images/{id}', [ProductController::class, 'destroyImage'])->name('product-images.destroy');
});

require __DIR__.'/auth.php';