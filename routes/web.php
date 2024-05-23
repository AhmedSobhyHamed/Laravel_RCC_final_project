<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\testcontroller;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/about',[testcontroller::class,'about'])->name('about');
Route::get('/contact',[testcontroller::class,'contact'])->name('contact');
Route::get('/',[testcontroller::class,'home'])->name('home');
Route::get('/product/{id}',[testcontroller::class,'product'])->name('product');
Route::post('/order',[testcontroller::class,'orderSave'])->name('order');