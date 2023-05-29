<?php

use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Stock\CategoryController;
use App\Http\Controllers\Stock\SupplierController;
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

Route::get('/plans', [PlansController::class, 'index'])->name('view_plans');

Route::get('/help', [HelpController::class, 'index'])->name('view_help');

Route::get('/stock', [StockController::class, 'index'])->name('view_stock');

Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');

Route::post('/stock/store', [StockController::class, 'store'])->name('stock.store');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

require __DIR__.'/auth.php';
