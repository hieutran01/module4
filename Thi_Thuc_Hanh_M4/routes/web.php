<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;

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

Route::prefix('spending')->group(function () {
    Route::get('/', [SpendingController::class, 'index'])->name('spending.index');
    Route::get('/create', [SpendingController::class, 'create'])->name('spending.create');
    Route::post('/store', [SpendingController::class, 'store'])->name('spending.store');
    Route::get('/show/{id}', [SpendingController::class, 'show'])->name('spending.show');
    Route::get('/edit/{id}', [SpendingController::class, 'edit'])->name('spending.edit');
    Route::put('/update/{id}', [SpendingController::class, 'update'])->name('spending.update');
    Route::delete('/destroy/{id}', [SpendingController::class, 'destroy'])->name('spending.destroy');
});