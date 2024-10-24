<?php

use App\Http\Middleware\admin;
use App\Http\Middleware\user;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logouts');

Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('Admindashboard');
        } else {
            return redirect()->route('user-dashboard');
        }
    })->name('dashboard');
});


Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('Admindashboard');

    Route::get('/Add-Books', function () {
        return view('admin.add-books');
    })->name('add-b');

    Route::get('/Books-borrow', function () {
        return view('admin.book-borrow');
    })->name('book-b');

    Route::get('/Books-notreturn', function () {
        return view('admin.book-notreturn');
    })->name('not-return');

    Route::get('/Borrowed-books', function () {
        return view('admin.borrowed-books');
    })->name('borrowed-b');

    Route::get('/Book-return', function () {
        return view('admin.book-returned');
    })->name('return');

    Route::get('/Users', function () {
        return view('admin.users');
    })->name('us');





});


Route::prefix('user')->middleware(['auth', user::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('user.index');
    })->name('user-dashboard');

    Route::get('/bookss', function () {
        return view('user.books');
    })->name('books');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('prof');

    Route::get('/borrowed-books', function () {
        return view('user.borrowed-books');
    })->name('bb');



});

Route::middleware('auth')->group(function () {
    Route::get('/user/download-id', [UserController::class, 'downloadId'])->name('user.downloadId');
});
// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');


require __DIR__.'/auth.php';
