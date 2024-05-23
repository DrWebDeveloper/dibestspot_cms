<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\v1\Admin\AdminContoller;
use App\Http\Controllers\v1\User\UserController;
use App\Http\Controllers\v1\Admin\PlatformController;
use App\Http\Controllers\v1\Admin\PackageController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;



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
    Route::resource('package', PackageController::class);

});


// Admin Routes.
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminContoller::class, 'dashboard'])->name('dashboard');

    // Routes for Platform
    Route::prefix('platform')->name('platform.')->group(function () {
        Route::get('/', [PlatformController::class, 'index'])->name('index');
        Route::get('/create', [PlatformController::class, 'create'])->name('create');
        Route::post('/store', [PlatformController::class, 'store'])->name('store');
        Route::get('/{platform_id}/show', [PlatformController::class, 'show'])->name('show');
        Route::get('/{platform_id}/edit', [PlatformController::class, 'edit'])->name('edit');
        Route::post('/{platform_id}/update', [PlatformController::class, 'update'])->name('update');
        // Route::delete('/{platform_id}', [PlatformController::class, 'destroy'])->name('destroy');
        Route::delete('/{platform_id}/delete', [PlatformController::class, 'destroy'])->name('platform.destroy');

    });

  Route::prefix('package')->name('package.')->group(function () {
    Route::get('/', [PackageController::class, 'index'])->name('index');
    Route::get('/create', [PackageController::class, 'create'])->name('create');
    Route::post('/store', [PackageController::class, 'store'])->name('store');
    Route::get('/{package_id}/show', [PackageController::class, 'show'])->name('show');
    Route::get('/{package_id}/edit', [PackageController::class, 'edit'])->name('edit');
    Route::post('/{package_id}/update', [PackageController::class, 'update'])->name('update');
    Route::delete('/{package_id}/delete', [PackageController::class, 'destroy'])->name('package.destroy');
});

});


require __DIR__ . '/auth.php';
