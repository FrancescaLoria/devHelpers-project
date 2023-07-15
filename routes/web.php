<?php

use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\CompleteProfileController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\Api\MostVotedController;
use App\Http\Controllers\ProfileController;
use Egulias\EmailValidator\Parser\Comment;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/complete-profile', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/complete-profile', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    
});

require __DIR__.'/auth.php';
