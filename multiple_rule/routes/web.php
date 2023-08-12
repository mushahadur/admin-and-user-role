<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'is_Admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/delete', [AdminController::class, 'destroy'])->name('user.delete');
    Route::get('/user/deactive/{id}', [AdminController::class, 'deactive'])->name('user.deactive');
    Route::get('/user/active/{id}', [AdminController::class, 'active'])->name('user.active');
    Route::get('/profile', [AdminController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('user');
});


// Route::get('/user', [UserController::class, 'index'])->name('user');             admin.profile.edit

// Route::get('/dashboard', function () {
//     return view('admin.layout.app');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
