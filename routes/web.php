<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// })->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', function () {
        return view('home');
    })->middleware(['auth', 'verified'])->name('home');

    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);

    Route::get('/post/tampil_hapus', [PostController::class, 'tampil_hapus'])->name('post.tampil_hapus');
    Route::get('/post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
    Route::delete('/post/kill/{id}', [PostController::class, 'kill'])->name('post.kill');
    Route::resource('/post', PostController::class);
    Route::resource('user', UserController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


