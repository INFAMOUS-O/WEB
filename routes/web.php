<?php

use App\Http\Controllers\Auth\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboardcontroller;



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

Route::get('/', [HomeController::class, 'index'])->name('homepage.index');

Route::get('/auth/{provider}/redirect',[ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback',[ProviderController::class,'callback']);

Route::get('/posts/{post}', [Homecontroller::class, 'show'])->middleware(['auth', 'verified'])->name('posts.show');
Route::get('/post/{postId}/comments', [CommentController::class,'index'])->middleware(['auth', 'verified'])->name('comments.index');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');



Route::get('/dashboard', [Dashboardcontroller::class,'index'])->middleware(['auth', 'verified'])->name('dashboard.index');
Route::post('/dashboard', [Dashboardcontroller::class,'store'])->middleware(['auth', 'verified'])->name('dashboard.store');

Route::get('/dashboard/{id}', [Dashboardcontroller::class,'delete'])->middleware(['auth', 'verified'])->name('dashboard.delete');
Route::get('/dashboard/edit/{id}', [Dashboardcontroller::class,'edit'])->middleware(['auth', 'verified'])->name('dashboard.edit');
Route::post('/dashboard/edit/{id}', [Dashboardcontroller::class,'update'])->middleware(['auth', 'verified'])->name('dashboard.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

