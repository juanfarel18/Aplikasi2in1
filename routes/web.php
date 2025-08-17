<?php

use App\Http\Controllers\BookingCarController;
use App\Http\Controllers\CarwashController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TransactionCarController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (root /) dialihkan ke halaman carwash untuk konsistensi.
Route::get('/', [SliderController::class, 'promo'])->name('front.index');

// Dashboard (sudah benar)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth user profile (sudah benar)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Promo sliders (sudah benar)
Route::get('/promo', [SliderController::class, 'promo'])->name('promo.page');
Route::resource('sliders', SliderController::class);
Route::patch('sliders/{slider}/toggle', [SliderController::class, 'toggle'])->name('sliders.toggle');
Route::post('sliders/update-order', [SliderController::class, 'updateOrder'])->name('sliders.updateOrder');

// Transactions (laundry) (sudah benar)
Route::resource('transaction', TransactionController::class);


// ✅ Group Carwash (Diperbaiki dan Dirapikan)
Route::prefix('carwash')->name('carwash.')->group(function () {
    
    // Rute utama /carwash
    Route::get('/', [CarwashController::class, 'index'])->name('index');

    // Alias lama supaya tetap bisa dipakai -> /carwash-page
    Route::get('/page', [CarwashController::class, 'index'])->name('page');

    // Booking mobil
    Route::get('/booking', [BookingCarController::class, 'index'])->name('booking.index'); 
    Route::get('/booking/create', [BookingCarController::class, 'create'])->name('booking.create'); 
    Route::post('/booking', [BookingCarController::class, 'store'])->name('booking.store');

    // Halaman statis
    Route::get('/price-list', fn() => view('carwash.price-list-car'))->name('price-list');
    Route::get('/profile-info', fn() => view('carwash.profile-car'))->name('profile-info'); 
    Route::get('/about', fn() => view('carwash.aboutuscar'))->name('about');
    Route::get('/contact', fn() => view('carwash.contactuscar'))->name('contact');
    Route::get('/gallery', fn() => view('carwash.galeri-car'))->name('gallery');
});


// Rute Transaksi Mobil (untuk user login)
Route::middleware(['auth'])->prefix('transactions/car')->name('transaction-car.')->group(function () {
    Route::get('/', [TransactionCarController::class, 'index'])->name('index');
    Route::get('/{id}', [TransactionCarController::class, 'show'])->name('show');
    // Route::post('/', [TransactionCarController::class, 'store'])->name('store');
});


require __DIR__.'/auth.php';
