<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
