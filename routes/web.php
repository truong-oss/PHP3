<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/products', [ProductController::class, 'index']);

// Route::prefix('admin')->group(function () {
//     Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
// });
Route::prefix('admin')->name('admin.')->group(function (){
    //các đường dẫn trg admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //route quản lí sản sphamr
    Route::prefix('products')->name('products.')->group(function (){
        Route::get('/',[ ProductController::class, 'index'])->name('index');//vd admin.products.index
        Route::get('/{id}/show',[ ProductController::class, 'show'])->name('show');
        Route::get('/create',[ ProductController::class, 'create'])->name('create');
        Route::post('/store',[ ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit',[ ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update',[ ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/destroy',[ ProductController::class, 'destroy'])->name('destroy');

       


    });

});