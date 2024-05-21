<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\v1\Admin\AdminContoller;
use App\Http\Controllers\v1\User\UserController;
use App\Http\Controllers\PlatformController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('welcome');
});

// Route to test the encryptData function
Route::prefix('test')->group(function () {
    Route::get('/encrypt', function () {
        $data = 'Umar';
        $encryptedData = encryptData($data);
        return $encryptedData;
    });

    Route::get('/decrypt', function () {
        $data = 'TRr8s4wjhNc0rUfkzxwxHzRpb1Brd1NwbUM0ZUtKNTdsWlFHeFE9PQ==';
        $decryptedData = decryptData($data);
        return $decryptedData;
    });
});

// Routes for Users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('auto-login/{marketplace_id}', [UserController::class, 'autoLogin'])->name('marketplace.login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('platform', PlatformController::class);
});


// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminContoller::class, 'dashboard'])->name('dashboard');

    // Routes for Platform
    Route::get('index', [ PlatformController::class, 'index'])->name('platform.index');
    Route::get('index', [ PlatformController::class, 'create'])->name('platform.index');
    Route::post('create', [ PlatformController::class, 'store'])->name('platform.store');
    Route::get('platform/edit/{id}', [ PlatformController::class, 'edit'])->name('platform.edit');
    Route::put('platform/update/{id}', [ PlatformController::class, 'update'])->name('platform.update');
    Route::delete('platform/delete/{id}', [ PlatformController::class, 'destroy'])->name('platform.destroy');

});


require __DIR__ . '/auth.php';
